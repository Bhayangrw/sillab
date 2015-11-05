<?php

class HistoryController extends \BaseController {
public function __construct(){
		$this->reglab = new Grafik();
	}
	public function find()
	{
		$cari = Input::get('datapasien');
		
		$datpasien = DB::table('v_pasien')
					->where('Nama','like', '%'.$cari.'%')
					->orWhere('id_pasien','like', '%'.$cari.'%')
					->paginate(10);

		return View::make('history.history', compact('cari','datpasien'));		 
		
	}
	public function detail($Id_Pasien)
	{
		$cari = Input::get('datapasien');
		
		$datpasien = DB::table('v_datapasien')
					->orWhere('id_pasien','=', $Id_Pasien)
					->get();
		$pasien = DB::table('v_pasien')
					->orWhere('id_pasien','=', $Id_Pasien)
					->get();

		return View::make('history.history_detail', compact('cari','datpasien','pasien'));		 
		
	}
	
	public function edit($noreglab)
	{
		$reglab 		= RegLab::where('NoReglab', '=', $noreglab)->first();
		$riwdiag 		= RiwayatDiagnosa::where('NoRegLab', '=', $noreglab)->paginate(10);
		$pemeriksaan 	= Pemeriksaan2::where('NoRegLab', '=', $noreglab)->paginate(10);
		$lab 			= Lab::all();

		return View::make('registrasi.index2_registrasi')
		->with('reglab', $reglab)
		->with('pemeriksaan', $pemeriksaan)
		->with('riwdiag', $riwdiag)
		->with('lab', $lab);
	}
	


}
