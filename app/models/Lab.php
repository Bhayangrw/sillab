<?php

class Lab extends Eloquent {
	
	protected $table = 'lab';
	protected $fillable = array('NmLab', 'Satker', 'Alamat', 'TglKerjasama');
	protected $primaryKey = 'KdLab';
    
    public $timestamps = false;
	
	public static $rules = array(
		'nmlab' => 'required'
    );
    
	public static $messages = array(
		'required' => 'Kolom harus diisi'
	);
	
	// Fungsi simpan *baca dari controller
	public function simpan($input)
	{
		$this->KdLab = $input['kdlab'];
		$this->NmLab = $input['nmlab'];
		$this->Satker = $input['satker'];
		$this->Alamat = $input['alamat'];
		$this->TglKerjasama = $input['tglkerjasama'];
		$this->save();
	}
	
	// Fungsi edit *baca dari controller edit
	public function handleEdit($input)
	{
		$id = $input['kdlab'];
		$update = $this->find($id);
		$update->NmLab = $input['nmlab'];
		$update->Satker = $input['satker'];
		$update->Alamat = $input['alamat'];
		$update->TglKerjasama = $input['tglkerjasama'];
		$update->save();
	}
	// Fungsi hapus *baca dari controller
	public function hapus($KdLab){
        self::find($KdLab)->delete();
    }
}