<?php

class Kelurahan extends Eloquent
{
	protected $table = 'kelurahan';

	protected $primaryKey = 'id_Kelurahan';

	public function kepalaKeluarga()
	{
		return $this->hasMany('KepalaKeluarga', 'id_Kelurahan');
	}
}
?>