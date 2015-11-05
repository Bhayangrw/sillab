<?php

class JnskategoriController extends \BaseController {
	
	public function __construct(){
		$this->jnskategori = new Jnskategori();
		$this->kategori = new Kategori();
		$this->subkategori = new SubKategori();
		$this->satuan = new Satuan();
		$this->lab = new Lab();
	}
	public function index()
	{
		$jnskategoris = Jnskategori::paginate(6);
		return View::make('jns_kategori.jnskategoris', compact('jnskategoris'));
		
	}
	
	// Fungsi tambah data 
	public function create()
	{
		$kategori = Kategori::all();
		$subkategori = SubKategori::all();
		$satuan = Satuan::all();
		
		$jnskategori = DB::table('jnskategori')
								->orderBy('created_at','dsc')
								->first();
		
		return View::make('jns_kategori.create_jnskategoris')
			->with('jnskategori', $jnskategori)
			->with('kategori', $kategori)
			->with('satuan', $satuan)
			->with('subkategori', $subkategori);
	}
	
	public function handleCreate()
	{
		$input = Input::all();
		$this->jnskategori->simpan($input);
		return Redirect::to('/jns_kategori.jnskategoris/create')->with('register_success', 'Tambah data berhasil disimpan !');
			
	}
	
	//Fungsi edit data
	public function edit($KdJnsKategori)
    {
		$jnskategori = Jnskategori::find($KdJnsKategori);
		$kategori = Kategori::all();
		$subkategori = SubKategori::all();
		$satuan = Satuan::all();
		
		return View::make('jns_kategori.edit_jnskategoris')
					->with('jnskategori', $jnskategori)
					->with('kategori', $kategori)
					->with('satuan', $satuan)
					->with('subkategori', $subkategori);
    }
	
	public function handleEdit()
    {
       $input = Input::all();
	   $this->jnskategori->handleEdit($input);
	   return Redirect::to('jnskategoris');
    }
	
	//Fungsi hapus
	public function hapus($KdJnsKategori)
	{ 
		$this->jnskategori->hapus($KdJnsKategori);
        return Redirect::to('/jns_kategori.jnskategoris');
	}

}
