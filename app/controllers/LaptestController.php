<?php

class LaptestController extends \BaseController {


	public function index()
	{
		$lab = Lab::all();
		$kdlab = Input::get('kdlab');
		$lapkeglab = DB::table('v_pemeriksaandetail')
						->where('KdLab', array($kdlab))
						->groupBy('KdKategori')
						->get();
		
		return View::make('laporan.laptest',compact('lab','lapkeglab'));
	}
	
	public function detail()
	{
		$kdlab = Input::get('kdlab');
		$tgl1 = Input::get('tgl1');
		$tgl2 = Input::get('tgl2');
		
		$lapkeglab = DB::table('v_pemeriksaandetail')
						->where('KdLab', array($kdlab))
						->groupBy('KdKategori')
						->get();
		
		return View::make('laporan.detail_laporan_keglab',compact('lapkeglab','tgl1','tgl2','kdlab'));
	}

}
