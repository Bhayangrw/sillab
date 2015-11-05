<?php

class Pasien2 extends Eloquent
{

	protected $table = 'pasien';
	protected $primaryKey = 'id_pasien';

	public function pegawai()
	{
		return $this->belongsToMany('Pegawai', 'reglab', 'id_pasien', 'IdPegawai')->withTimestamps();
	}

	public function reglab()
	{
		return $this->hasMany('RegLab', 'id_pasien');
	}

	public function kepalaKeluarga()
	{
		return $this->belongsTo('KepalaKeluarga', 'no_kartu');
	}
}
?>