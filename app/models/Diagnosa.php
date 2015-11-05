<?php

class Diagnosa extends Eloquent
{

	protected $table = 'diagnosa';

	protected $primaryKey = 'KdIcd';

	public function reglab()
	{
		return $this->belongToMany('RegLab', 'riwayatdiagnosa', 'KdIcd', 'NoRegLab');
	}

}
?>