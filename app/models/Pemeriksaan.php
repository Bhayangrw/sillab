<?php

class Pemeriksaan extends Eloquent {
	
	protected $table = 'v_detailbil';
	
	public function pasien()
	{
		return $this->belongsTo('pasien', 'NoMedrec');
	}
	
}