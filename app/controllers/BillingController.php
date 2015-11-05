<?php

class BillingController extends \BaseController {
	
	public function __construct(){
		$this->billing = new Billing();
	}
	
	public function index()
	{
		$billings = Billing::where('tgl_reg', '=', date("Y-m-d"))->orderBy('Tgl_Periksa')->paginate(5);
		return View::make('billing.billings', compact('billings'));
	}
	
	public function filterindex($tgl_reg)
	{
		$bils = Billing::where('tgl_reg', '=', $tgl_reg )->orderBy('Tgl_Periksa')->paginate(5);
		return View::make('billing.filterbil',compact('bils'));
	}
	//filtering
	public function filter()
	{	
		$filterbil = Input::get('tglperiksa'); //Untuk pencarian berdasarkan tanggal periksa
		
		$bils = Billing::where('tgl_reg', '=', $filterbil )->orderBy('Tgl_Periksa')->paginate(5);
		return View::make('billing.filterbil')
						->with('bils', $bils);
									
	}
	public function filterReglab()
	{	
		$filterreglab = Input::get('noreglab'); //Untuk pencarian berdasarkan tanggal periksa
		$bils = Billing::where('NoRegLab', '=', $filterreglab )->orWhere('nama','LIKE', '%'.$filterreglab.'%' )->orderBy('Tgl_Periksa')->paginate(5);
		
		return View::make('billing.filterbil')
						->with('bils', $bils);
		
	}
	//end filtering
	
	
	//data cetak rekap billing non-rujukan
	public function rekapbil()
	{		
		return View::make('billing.rekapbil');
	
	}
	
	public function rekapbildetail()
	{
		$tgl1 = Input::get('tgl1');
		$tgl2 = Input::get('tgl2');
		$spesimen = Input::get('spesimen');

		if (($spesimen) == 2) {
		$bils = DB::table('v_bukanrujukan')->whereBetween('tgl_reg', array($tgl1, $tgl2))
							->select('tgl_reg',DB::raw('sum(Harga) as hargatot'))
							->groupBy('tgl_reg')->get();
							
		$bils2 = DB::table('v_bukanrujukan')->whereBetween('tgl_reg', array($tgl1, $tgl2))
							->select('tgl_reg',DB::raw('sum(Harga) as hargatot'))->get();
		
					
		return View::make('billing.detail_rekapbil',compact('bils','bils2','tgl1','tgl2','spesimen'));
		}
	
	elseif (($spesimen) == 1) {
		$bils = DB::table('v_rujukandetail')->whereBetween('tgl_reg', array($tgl1, $tgl2))
							->select('tgl_reg',DB::raw('sum(Harga) as hargatot'))
							->groupBy('tgl_reg')->get();
							
		$bils2 = DB::table('v_rujukandetail')->whereBetween('tgl_reg', array($tgl1, $tgl2))
							->select('tgl_reg',DB::raw('sum(Harga) as hargatot'))->get();
								
		return View::make('billing.detail_rekapbil',compact('bils','bils2','tgl1','tgl2','spesimen'));
	}
	else{
		$bils = DB::table('v_transaksidetail')->whereBetween('tgl_reg', array($tgl1, $tgl2))
							->select('tgl_reg',DB::raw('sum(Harga) as hargatot'))
							->groupBy('tgl_reg')->get();
							
		$bils2 = DB::table('v_transaksidetail')->whereBetween('tgl_reg', array($tgl1, $tgl2))
							->select('tgl_reg',DB::raw('sum(Harga) as hargatot'))->get();
								
		return View::make('billing.detail_rekapbil',compact('bils','bils2','tgl1','tgl2','spesimen'));
	}
	}
	//akhir
	
	
	//detail data
	public function detail($NoRegLab)
    {
		 
		 $rujukan = ViewRujukandetail::where('NoRegLab', '=', $NoRegLab)->first();
		 $pasien = Pasien::where('NoRegLab', '=', $NoRegLab)->first();
		 $hargatotal = Pemeriksaan::where('NoRegLab', '=', $NoRegLab)->sum('Harga');
		 $pemeriksaan = Pemeriksaan::where('NoRegLab', '=', $NoRegLab)->orderBy('NoRegLab','asc')->get();

		 return View::make('billing.detail_billing', compact('pemeriksaan','hargatotal','pasien','rujukan'));
	}
	
	public function status2($NoRegLab,$StatusPembayaran)
	{
		DB::table('billing')
				->where('NoRegLab','=', $NoRegLab)
				->update(array('StatusPembayaran' => $StatusPembayaran));
		return Redirect::to('/billings');
	}
    
}