<?php

class TarifController extends \BaseController {
	
	public function __construct(){
		$this->jnskategori = new Jnskategori();
		$this->lab = new Lab();
		$this->tarif = new Tarif();
	}
	
	public function index()
	{
		$kdlab = Input::get('kdlab'); //Untuk Searing berdasarkan nama laboratorium
		
		$tarifs = Tarif::paginate(5);
		$lab = Lab::groupBy('NmLab')->get();
		return View::make('tarif.tarifs', compact('tarifs'))->with('lab',$lab);
	}
	
	public function filter()
	{
		$filtertarifs = Input::get('kdlab'); //Untuk Searing berdasarkan nama laboratorium
		$lab = Lab::groupBy('NmLab')->get();
		$labcari = Lab::where('KdLab', '=', $filtertarifs)->get();
		$tarifs = Tarif::where('KdLab', '=', $filtertarifs)->paginate(5);
							return View::make('tarif.filtertarif')
									->with('filtertarifs', $filtertarifs)
									->with('lab',$lab)
									->with('labcari',$labcari)
									->with('tarifs', $tarifs);
	}
	
	// Fungsi tambah data 
	public function create()
	{
		$jnskategori = Jnskategori::all();
		$lab = Lab::all();
		$tarifs = DB::table('tarif')
								->orderBy('created_at','dsc')
								->first();
		return View::make('tarif.create_tarif')->with('jnskategori', $jnskategori)
												->with('lab', $lab)
												->with('tarifs', $tarifs);
	}
	public function handleCreate()
	{
		
		$input = Input::all();
		$this->tarif->simpan($input);
		return Redirect::to('tarifs/create')->with('register_success', 'Tambah data berhasil disimpan !');
			
	}
    
	//Fungsi edit data
	public function edit($KdTarif)
    {
		$tarif = Tarif::find($KdTarif);
		$jnskategori = Jnskategori::all();
		$lab = Lab::all();
		
		return View::make('tarif.edit_tarif')->with('jnskategori', $jnskategori)->with('lab', $lab)->with('tarif', $tarif);
    }
	
	public function handleEdit()
    {
       $input = Input::all();
	   $this->tarif->handleEdit($input);
	   return Redirect::to('tarifs')->with('register_success', 'Data berhasil di ubah!');
    }
	
	//Fungsi hapus
	public function hapus($KdTarif)
	{ 
		$this->tarif->hapus($KdTarif);
        return Redirect::to('tarifs');
	}

	public function detail($KdLab)
    {
    	$kodelab = $KdLab;
		$detarif = DB::table('v_pemeriksaandetail')
						->where('KdLab','=', $kodelab)
						->groupBy('KdKategori')
						->get();
		
		return View::make('tarif.detail_tarif', compact('detarif'))->with('kodelab',$kodelab);;
    }
}