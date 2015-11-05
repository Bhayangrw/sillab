<?php

class Jnskategori extends Eloquent {
	
	protected $table = 'Jnskategori';
	protected $fillable = array('NamaJnsKategori','NilaiRujukan', 'KdKategori','KdSatuan','KdSubKategori');
	protected $primaryKey = 'KdJnsKategori';
    
    public $timestamps = true;

	public function satuan()
	{
		return $this->belongsTo('Satuan', 'KdSatuan');
	}

	public function kategori()
	{
		return $this->belongsTo('Kategori', 'KdKategori');
	}

	public function subkategori()
	{
		return $this->belongsTo('Subkategori', 'KdSubKategori');
	}

	public function reglab()
	{
		return $this->belongsToMany('RegLab', 'pemeriksaan', 'KdJnsKategori', 'NoReglab');
	}

	public function lab()
	{
		return $this->belongsToMany('Lab', 'tarif', 'KdJnsKategori', 'KdLab');
	}

	public function tarif()
	{
		return $this->hasMany('Tarif', 'KdJnsKategori');
	}
	
    public static $rules = array(
		'KdSatuan' => 'required',
		'KdKategori' => 'required',
		'NamaJnsKategori' => 'required',
		'NilaiRujukan' => 'required',
    );
	
	public static $messages = array(
		'required' => 'Kolom harus diisi'
	);
	
	// Fungsi simpan *baca dari controller
	public function simpan($input)
	{
		$this->KdJnsKategori = $input['kdjnskategori'];
		$this->NamaJnsKategori = $input['nmjnskategori'];
		$this->NilaiRujukan = $input['nilairujukan'];
		$this->KdSatuan = $input['kdsatuan'];
		$this->KdKategori = $input['kdkategori'];
		$this->KdSubKategori = $input['kdsubkategori'];
		$this->save();
	}
	
	// Fungsi edit *baca dari controller edit
	public function handleEdit($input)
	{
		$id = $input['kdjnskategori'];
		$update = $this->find($id);
		$update->NamaJnsKategori = $input['nmjnskategori'];
		$update->NilaiRujukan = $input['nilairujukan'];
		$update->KdSatuan = $input['kdsatuan'];
		$update->KdKategori = $input['kdkategori'];
		$update->KdSubKategori = $input['kdsubkategori'];
		$update->save();
	}
	
	// Fungsi hapus *baca dari controller
	public function hapus($KdJnsKategori){
        self::find($KdJnsKategori)->delete();
    }
	
}