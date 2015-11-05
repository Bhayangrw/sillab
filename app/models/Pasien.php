<?php

class Pasien extends Eloquent
{

	protected $table = 'v_datapasien';
	protected $primaryKey = 'NoMedrec';

	public function pegawai()
	{
		return $this->belongsToMany('pegawai', 'reglab', 'NoMedrec', 'IdPegawai');
	}
	
	public function v_detailbil()
	{
		return $this->belongsTo('pemeriksaan', 'NoMedrec');
	}
	
	public function reglab()
	{
		return $this->belongsTo('reglab', 'NoRegLab','NamaPasien','JenisKelamin');
	}
}

?>