<?php

class Satuan extends Eloquent {
	
	protected $table = 'satuan';
	protected $fillable = array('KdSatuan', 'NmSatuan', 'Ket');
	protected $primaryKey = 'KdSatuan';
    
    public $timestamps = true;
	
	//aturan untuk data satuan
    public static $rules = array(
		'nmsatuan' => 'required'
    );
	
	public static $messages = array(
		'required' => 'Kolom harus diisi'
	);
	
	// Fungsi simpan *baca dari controller
	public function simpan($input)
	{
		$this->KdSatuan = $input['kdsatuan'];
		$this->NmSatuan = $input['nmsatuan'];
		$this->Ket = $input['ket'];
		$this->save();
	}
	
	// Fungsi edit *baca dari controller edit
	public function handleEdit($input)
	{
		$id = $input['kdsatuan'];
		$update = $this->find($id);
		$update->NmSatuan = $input['nmsatuan'];
		$update->Ket = $input['ket'];
		$update->save();
	}

	// Fungsi hapus *baca dari controller
	public function hapus($KdSatuan){
        self::find($KdSatuan)->delete();
    }
	
}
