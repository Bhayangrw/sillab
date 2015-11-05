<?php

class Rujukan extends Eloquent {
	
	protected $table = 'rujukan';
	protected $fillable = array('NoRegLab','NmrSpesimen','AmbilSpesimen', 'JnsSpesimen','Gejala','WaktuPengiriman','WaktuPenerimaan');
	protected $primaryKey = 'NmrSpesimen';
    
    public $timestamps = true;
	
	public function reglab()
	{
		return $this->belongsTo('reglab', 'NoRegLab');
	}
	public function pasien()
	{
		return $this->belongsTo('pasien', 'NoMedRec');
	}

	//aturan untuk data satuan
    public static $rules = array(
		'kdlab' => 'required',
		'waktupengirimaan' => 'required',
    );
	
	public static $messages = array(
		'required' => 'Kolom harus diisi'
	);
	
	// Fungsi simpan *baca dari controller
	public function simpan($input)
	{
		$this->NmrSpesimen = $input['nmrspesimen'];
		$this->NoRegLab = $input['noreglab'];
		$this->JnsSpesimen = $input['jnsspesimen'];
		$this->Gejala = $input['gejala'];
		$this->WaktuPengiriman = $input['waktupengiriman'];
		$this->save();
	}
	
	// Fungsi edit *baca dari controller
	public function handleEdit($input)
	{
		$id = $input['nmrspesimen'];
		$update = $this->find($id);
		$update->NoRegLab = $input['noreglab'];
		$update->AmbilSpesimen = $input['ambilspesimen'];
		$update->JnsSpesimen = $input['jnsspesimen'];
		$update->Gejala = $input['gejala'];
		$update->WaktuPengiriman = $input['waktupengiriman'];
		$update->WaktuPenerimaan = $input['waktupenerimaan'];
		$update->save();
	}

	// Fungsi hapus *baca dari controller
	public function hapus($NmrSpesimen){
        self::find($NmrSpesimen)->delete();
    }
	
}
