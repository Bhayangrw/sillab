<?php

class SubkategoriController extends \BaseController {
	public function __construct(){
		$this->subkategori = new Subkategori();
	}
	public function index()
	{
		$subkategoris = Subkategori::paginate(10);
		return View::make('subkategori.subkategoris', compact('subkategoris'));
	}
	
	//Method tambah data
	public function create()
	{
		$subkategori = DB::table('subkategori')->orderBy('created_at', 'dsc')->first();
		return View::make('subkategori.create_subkategoris')->with('subkategori',$subkategori);
	}
	public function handleCreate()
	{
		$validator = Validator::make($input = Input::all(), Subkategori::$rules, Subkategori::$messages);
		
		if ($validator->fails()) {
			$messages = $validator->messages();
			
			return Redirect::to('/subkategori.subkategoris/create')->withErrors($validator)->withInput(Input::all());
			} else {
				$this->subkategori->simpan($input);
				return Redirect::to('/subkategori.subkategoris/create')->with('register_success', 'Data Subkategori berhasil di simpan !');
			}
	}
	
	//Method edit data
	public function edit($KdSubKategori)
    {
		$subkategori = Subkategori::find($KdSubKategori);
		return View::make('/subkategori.edit_subkategoris')->with('subkategori', $subkategori);
    }
	
	public function handleEdit()
    {
		$input = Input::all();
		$this->subkategori->handleEdit($input);
		return Redirect::to('/subkategori.subkategoris')->with('register_success', 'Data berhasil di ubah !');
    }
	//Fungsi hapus
	public function hapus($KdSubKategori)
	{ 
		$this->subkategori->hapus($KdSubKategori);
        return Redirect::to('/subkategori.subkategoris')->with('register_success', 'Data berhasil di hapus !');
	}

}
