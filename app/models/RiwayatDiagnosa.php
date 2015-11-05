<?php

class RiwayatDiagnosa extends Eloquent
{

	protected $table = 'riwayatdiagnosa';

	protected $primaryKey = 'id';

	public function hapus($id)
	{
		self::find($id)->delete();
	}

	public function reglab()
	{
		return $this->belongsTo('RegLab', 'NoRegLab');
	}

	public function diagnosa()
	{
		return $this->belongsTo('Diagnosa', 'KdIcd');
	}
}
?>