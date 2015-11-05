<?php

class Tarif extends Eloquent {
	
	protected $table = 'tarif';
	protected $fillable = array('KdLab', 'KdJnsKategori', 'Harga');
	protected $primaryKey = 'KdTarif';
    
    public $timestamps = true;
	
	public function jnskategori()
	{
		return $this->belongsTo('Jnskategori', 'KdJnsKategori');
	}
	public function lab()
	{
		return $this->belongsTo('Lab', 'KdLab');
	}

	public function reglab()
	{
		return $this->belongsToMany('RegLab', 'pemeriksaan', 'KdTarif', 'NoRegLab');
	}

	public function pemeriksaan()
	{
		return $this->hasMany('Pemeriksaan2', 'KdTarif');
	}
	
	// Fungsi simpan *baca dari controller
	public function simpan($input)
	{
		$this->KdTarif = $input['lab'].$input['kdtarif'];
		$this->KdLab = $input['lab'];
		$this->KdJnsKategori = $input['jnskategori'];
		$this->Harga = $input['harga'];
		$this->save();
	}
	
	// Fungsi edit *baca dari controller edit
	public function handleEdit($input)
	{
		$id = $input['kdtarif'];
		$update = $this->find($id);
		$update->KdLab = $input['lab'];
		$update->KdJnsKategori = $input['jnskategori'];
		$update->Harga = $input['harga'];
		$update->save();
	}
	// Fungsi hapus *baca dari controller
	public function hapus($KdTarif){
        self::find($KdTarif)->delete();
    }

    //fungsi load harga
    public function getDataharga($id = null)
    {
		if ($id != null) {
            return self::where('KdTarif', '=', $id)->get();
        }else{
            return self::all();
        }
	}
}