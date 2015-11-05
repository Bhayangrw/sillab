<?php

class Pegawai extends Eloquent
{

	protected $table = 'pegawai';

	public function pasien()
	{
		return $this->belongsToMany('Pasien', 'reglab', 'IdPegawai', 'id_pasien');
	}
}
?>