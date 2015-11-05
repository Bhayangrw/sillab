<?php

class KategoriController extends \BaseController {
	
	public function __construct(){
		$this->kategori = new Kategori();
	}
	
	public function index()
	{
		$kategoris = Kategori::paginate(10);
		return View::make('kategori.kategoris', compact('kategoris'));
		
	}
	
	
	//Method tambah data
	public function create()
	{
		$kategori = DB::table('kategori')->orderBy('created_at','dsc')->first();
		return View::make('kategori.create_kategoris')->with('kategori',$kategori);
	}
	public function handleCreate()
	{
		$validator = Validator::make($input = Input::all(), Kategori::$rules, Kategori::$messages);
		
		if ($validator->fails()) {
			$messages = $validator->messages();
			
			return Redirect::to('/kategoris/create')->withErrors($validator)->withInput(Input::all());
			} else {
				$this->kategori->simpan($input);
				return Redirect::to('/kategoris/create')->with('register_success', 'Data kategori berhasil di simpan !');
			}
	}
	
	//Method edit data
	public function edit($KdKategori)
    {
		$kategori = Kategori::find($KdKategori);
		return View::make('kategori.edit_kategoris')->with('kategori', $kategori);
    }
	
	public function handleEdit()
    {
		$input = Input::all();
		$this->kategori->handleEdit($input);
		return Redirect::to('/kategori.kategoris')->with('register_success', 'Data berhasil di ubah !');
    }
	
	//Fungsi hapus
	public function hapus($KdKategori)
	{ 
		$this->kategori->hapus($KdKategori);
        return Redirect::to('/kategori.kategoris')->with('register_success', 'Data berhasil di hapus !');
	}
	


}
