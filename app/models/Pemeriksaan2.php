<?php

class Pemeriksaan2 extends Eloquent
{

	protected $table = 'pemeriksaan';
	protected $primaryKey = 'id';
	public $timestamps = false;

	public function hapus($id)
	{
		self::find($id)->delete();
	}

	public function reglab()
	{
		return $this->belongsTo('RegLab', 'NoRegLab');
	}

	public function jnskategori()
	{
		return $this->belongsTo('Jnskategori', 'KdJnsKategori');
	}

	public function tarif()
	{
		return $this->belongsTo('Tarif', 'KdTarif');
	}
}
?>