<?php

class RujukanController extends \BaseController {
	
	public function __construct(){
		$this->rujukan = new Rujukan();
		$this->lab = new Lab();
		$this->pasien = new Pasien();
		$this->jnskategori = new Jnskategori();

	}
	
	public function indexx($noreglab)
	{
		$reglab 		= RegLab::where('NoReglab', '=', $noreglab)->first();
		//$idpemeriksaan	= Pemeriksaan::orderBy('id', 'desc')->pluck('id');
		$riwdiag 		= RiwayatDiagnosa::where('NoRegLab', '=', $noreglab)->paginate();
		$pemeriksaan 	= Pemeriksaan2::where('NoRegLab', '=', $noreglab)->paginate();
		$lab 			= Lab::all();

		return View::make('registrasi.index2_registrasi')
				->with('reglab', $reglab)
				->with('pemeriksaan', $pemeriksaan)
				->with('riwdiag', $riwdiag)
				->with('lab', $lab)
				->with('register_success', 'Data Rujukan Berhasil Disimpan !');
	}
	
	public function index()
	{
		$viewrujukan = ViewRujukandetail::where('tgl_reg', '=', date("Y-m-d") )->paginate(5);
		return View::make('rujukan.rujukan', compact('viewrujukan'));
	
	}
	public function filterindex($tgl_reg)
	{
		$viewrujukan = ViewRujukandetail::where('tgl_reg', '=', $tgl_reg )->paginate(5);
		return View::make('rujukan.rujukan',compact('viewrujukan'));
	}
	//filtering
	public function filter()
	{	
		$filterbil = Input::get('tglperiksa'); //Untuk pencarian berdasarkan tanggal periksa
		
		$viewrujukan = ViewRujukandetail::where('tgl_reg', '=', $filterbil )->paginate(5);
		return View::make('rujukan.rujukan', compact('viewrujukan'));
									
	}
	public function filterrujukan()
	{	
		$filterreglab = Input::get('noreglab'); //Untuk pencarian berdasarkan tanggal periksa
		
		$viewrujukan = ViewRujukandetail::where('NoRegLab', '=', $filterreglab )->paginate(5);
		return View::make('rujukan.rujukan',compact('viewrujukan'));
		
	}
	//end filtering
	
	// Fungsi tambah data 
	public function create($noreglab)
	{
		$reglab = RegLab::where('NoRegLab', '=', $noreglab)->first();
		$lab = Lab::all();
		$pasien = Pasien::all();
		$jnskategori = Jnskategori::all();
		$rujukan = DB::table('rujukan')
								->orderBy('created_at','dsc')
								->first();

		return View::make('rujukan.create_rujukan')
					->with('lab',$lab)
					->with('pasien',$pasien)
					->with('rujukan',$rujukan)
					->with('jnskategori',$jnskategori)
					->with('reglab', $reglab);
	}
	
	public function handleCreate()
	{
		$validator 		= Validator::make($input = Input::all(), Rujukan::$rules, Rujukan::$messages);
		$noreglab 		= Input::get('noreglab');
		$reglab 		= RegLab::where('NoReglab', '=', $noreglab)->first();
		//$idpemeriksaan	= Pemeriksaan::orderBy('id', 'desc')->pluck('id');
		$riwdiag 		= RiwayatDiagnosa::where('NoRegLab', '=', $noreglab)->paginate();
		$pemeriksaan 	= Pemeriksaan2::where('NoRegLab', '=', $noreglab)->paginate();
		$lab 			= Lab::all();
		
		
				$this->rujukan->simpan($input);
				//return Redirect::to('/rujukan/index');
				return View::make('registrasi.index2_registrasi')
				->with('reglab', $reglab)
				->with('pemeriksaan', $pemeriksaan)
				->with('riwdiag', $riwdiag)
				->with('lab', $lab)
				->with('register_success', 'Data Rujukan Berhasil Disimpan !');

			
	}
	
	//Fungsi edit data
	public function edit($NmrSpesimen)
    {
    	$rujukan = Rujukan::find($NmrSpesimen);
    	$lab = Lab::get();
		$pasien = Pasien::get();
		$jnskategori = Jnskategori::get();
		//$reglab = Reglab::all();

		return View::make('rujukan.edit_rujukan')
					->with('rujukan', $rujukan)
					->with('lab',$lab)
					->with('pasien',$pasien)
					->with('jnskategori',$jnskategori);
					//->with('reglab',$reglab);
    }
	
	public function handleEdit()
    {
       $input = Input::all();
	   $this->rujukan->handleEdit($input);
	   return Redirect::to('/rujukan')->with('register_success', 'Data berhasil di ubah!');
    }
	
	//Fungsi hapus
	public function hapus($NmrSpesimen)
	{ 
		$this->rujukan->hapus($NmrSpesimen);
        return Redirect::to('/rujukan');
	}
	
	//detail data
	public function detail($NmrSpesimen)
    {
		$rujukan = DB::table('v_rujukandetail')->where('NmrSpesimen','=',$NmrSpesimen)->first();
		return View::make('rujukan.detail_rujukan')
					->with('rujukan', $rujukan);
    }

}