<?php

class RiwayatDiagnosaController extends BaseController
{
	public function __construct()
	{
		$this->riwdiag = new RiwayatDiagnosa;
	}

	public function index()
	{
		$input 		= Input::get('diagnosa');
		$iddiagnosa = Diagnosa::where('KdIcd', 'LIKE', '%'.$input.'%')->paginate(20);
		$diagnosa 	= Diagnosa::where('Diagnosa', 'LIKE', '%'.$input.'%')->paginate(20);

		return View::make('index_riwdiag.blade.php')
			->with('iddiagnosa', $iddiagnosa)
			->with('diagnosa', $diagnosa);
	}

	public function create()
	{
		$diagnosa = Diagnosa::all();
		$noreglab = RegLab::where('NoRegLab', '=', Input::get('noreglab'))->first();


		return View::make('riwdiag.create_riwdiag')
		->with('noreglab', $noreglab)	
		->with('diagnosa', $diagnosa);
	}

	public function store()
	{
		$reglab = RegLab::where('NoRegLab', '=', Input::get('noreglab'))->first();
		$kdicd = Input::get('kdicd');
		$noreglab = Input::get('noreglab');
		$lab 	  = Lab::all();

		$reglab->diagnosa()->attach($kdicd);

		$idriw = RiwayatDiagnosa::orderBy('id', 'desc')->pluck('id');
		$riwdiag = RiwayatDiagnosa::where('NoRegLab', '=', Input::get('noreglab'))->paginate();
		$pemeriksaan 	= Pemeriksaan2::where('NoRegLab', '=', Input::get('noreglab'))->paginate();
		//$riwdiag = RiwayatDiagnosa::find($idriw);
		
		return View::make('registrasi.index2_registrasi')
		->with('reglab', $reglab)
		->with('riwdiag', $riwdiag)
		->with('pemeriksaan', $pemeriksaan)
		->with('lab', $lab);
	}

	public function hapus($id, $noreglab)
	{
		$this->riwdiag->hapus($id);

		$reglab = RegLab::where('NoRegLab', '=', $noreglab)->first();
		$idriw = RiwayatDiagnosa::orderBy('id', 'desc')->pluck('id');
		$riwdiag = RiwayatDiagnosa::where('NoRegLab', '=', $noreglab)->paginate();
		$lab 	= Lab::all();

		$pemeriksaan 	= Pemeriksaan2::where('NoRegLab', '=', $noreglab)->paginate();
		
		return View::make('registrasi.index2_registrasi')
		->with('reglab', $reglab)	
		->with('riwdiag', $riwdiag)
		->with('pemeriksaan', $pemeriksaan)
		->with('lab', $lab);
	}
}
?>