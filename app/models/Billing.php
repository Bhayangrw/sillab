<?php

class Billing extends Eloquent {
	
	protected $table = 'v_transaksi';
	
	public function rujukan()
	{
		return $this->belongsTo('rujukan', 'NoRegLab');
	}
	
}