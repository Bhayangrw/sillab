<?php

class RegLab extends Eloquent
{

	protected $table = 'reglab';

	protected $primaryKey = 'NoRegLab';

	public function diagnosa()
	{
		return $this->belongsToMany('Diagnosa', 'riwayatdiagnosa', 'NoRegLab', 'KdIcd');
	}

	public function jnskategori()
	{
		return $this->belongsToMany('Jnskategori', 'pemeriksaan', 'NoRegLab', 'KdJnsKategori');
	}

	public function pasien()
	{
		return $this->belongsTo('Pasien2', 'id_pasien');
	}

	public function tarif()
	{
		return $this->belongsToMany('Tarif', 'pemeriksaan', 'NoRegLab', 'KdTarif');
	}
	
	public function bil()
    {
        return $this->belongsToMany('RegLab', 'reglab', 'NoRegLab');
    }
}
?>