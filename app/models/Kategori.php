<?php

class Kategori extends Eloquent {
	protected $table = 'kategori';
	protected $fillable = array('NamaKategori');
	protected $primaryKey = 'KdKategori';
    
    public $timestamps = true;
	
	public static $rules = array(
		'kdkategori' => 'required',
		'kategori' => 'required'
    );
	
	public static $messages = array(
		'required' => 'Kolom harus diisi'
	);
	
	// Fungsi simpan *baca dari controller
	public function simpan($input)
	{
		$this->KdKategori = $input['kdkategori'];
		$this->NamaKategori = $input['kategori'];
		$this->save();
	}
	
	// Fungsi edit *baca dari kontroller
	public function handleEdit($input)
	{
		$id = $input['kdkategori'];
		$update = $this->find($id);
		$update->NamaKategori = $input['kategori'];
		$update->save();
	}
	
	// Fungsi hapus *baca dari controller
	public function hapus($KdKategori){
        self::find($KdKategori)->delete();
    }
	
}





