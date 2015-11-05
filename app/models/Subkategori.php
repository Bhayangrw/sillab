<?php

class Subkategori extends Eloquent {
	protected $table = 'subkategori';
	protected $fillable = array('NmSubKategori');
	protected $primaryKey = 'KdSubKategori';
    
    public $timestamps = true;
	
	
	public static $rules = array(
		'kdsubkategori' => 'required',
		'nmsubkategori' => 'required'
    );
	
	public static $messages = array(
		'required' => 'Kolom harus diisi'
	);
	
	// Fungsi simpan *baca dari controller
	public function simpan($input)
	{
		$this->KdSubKategori = $input['kdsubkategori'];
		$this->NmSubKategori = $input['nmsubkategori'];
		$this->save();
	}
	
	// Fungsi edit *baca dari kontroller
	public function handleEdit($input)
	{
		$id = $input['kdsubkategori'];
		$update = $this->find($id);
		$update->NmSubKategori = $input['nmsubkategori'];
		$update->save();
	}
	
	// Fungsi hapus *baca dari controller
	public function hapus($KdSubKategori){
        self::find($KdSubKategori)->delete();
    }

}


