<?php

class Bil extends Eloquent {
	
	protected $table = 'billing';
	public $timestamps = false;
	// Fungsi simpan *baca dari controller
	
	public function reglab()
    {
        return $this->hasOne('RegLab');
    }
    public function simpan($input)
	{
		$this->NoRegLab = $input['noreglab'];
		$this->save();
	}

	
}
