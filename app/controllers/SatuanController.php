<?php

class SatuanController extends \BaseController {
	
	public function __construct(){
		$this->satuan = new Satuan();
	}
	
	public function index()
	{
		$satuan = Satuan::paginate(10);
		return View::make('satuan.satuan', compact('satuan'));
	}
	
	// Fungsi tambah data 
	public function create()
	{
		$satuans  = DB::table('satuan')->orderBy('created_at', 'dsc')->first();
		return View::make('satuan.create_satuan')->with('satuans',$satuans);
	}
	
	public function handleCreate()
	{
		$validator = Validator::make($input = Input::all(), Satuan::$rules, Satuan::$messages);
		
		if ($validator->fails()) {
			$messages = $validator->messages();
			
			return Redirect::to('/satuan/create')->withErrors($validator)->withInput(Input::all());
			} else {
				$this->satuan->simpan($input);
				return Redirect::to('/satuan.satuan/create')->with('register_success', 'Tambah data berhasil disimpan !');
			}
	}
	
	
	//Fungsi edit data
	public function edit($KdSatuan)
    {
		$satuan = Satuan::find($KdSatuan);
		return View::make('satuan.edit_satuan')->with('satuan', $satuan);
    }
	
	public function handleEdit()
    {
       $input = Input::all();
	   $this->satuan->handleEdit($input);
	   return Redirect::to('/satuan.satuan');
    }
	
	//Fungsi hapus
	public function hapus($KdSatuan)
	{ 
		$this->satuan->hapus($KdSatuan);
        return Redirect::to('/satuan');
	}
	
	//detail data
	public function detail($KdSatuan)
    {

		 $satuan = Satuan::find($KdSatuan);
		 return View::make('satuan.detail_satuan')->with('satuan', $satuan);
	}
    

}