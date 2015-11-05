<?php

class KepalaKeluarga extends Eloquent
{

	protected $table = 'kepala_keluarga';

	protected $primaryKey = 'no_kartu';

	public function pasien()
	{
		return $this->hasMany('Pasien2', 'no_kartu');
	}

	public function kelurahan()
	{
		return $this->belongsTo('Kelurahan', 'id_Kelurahan');
	}
}
?>