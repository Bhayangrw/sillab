<?php

class LapekspedisiController extends \BaseController {

	public function __construct(){
		$this->lapregistrasi = new LapRegistrasi();
	}

	public function index()
	{
				
			return View::make('laporan.lapekspedisi',compact('reglab'));
		
	}

	public function find()
	{
		$tgl1 = Input::get('tgl1');
		$tgl2 = Input::get('tgl2');
		$noreglab = Input::get('noreglab');
		
		if (($noreglab)==null) {
			$reglab = LapRegistrasi::whereBetween('tgl_reg', array($tgl1, $tgl2))->paginate(5);				
			return View::make('laporan.lapekspedisi_detail',compact('reglab','tgl1','tgl2'));
		}
		else {
			$reglab = LapRegistrasi::where('NoRegLab','=', $noreglab)->paginate(5);				
			return View::make('laporan.lapekspedisi_detail',compact('reglab','tgl1','tgl2'));
		}
	}

}
