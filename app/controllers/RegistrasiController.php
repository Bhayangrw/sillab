<?php

class RegistrasiController extends BaseController
{

	public function __construct()
	{
		$this->pasien = new Pasien();
		$this->pegawai = new Pegawai();
		$this->billing = new Bil();
		$this->jnskategori = new JnsKategori();
		$this->reglab = new RegLab();
		$this->diagnosa = new Diagnosa();
	}

	public function searching()
	{
		//$nomedrec = Input::get('nomedrec');
		//$pasien = Pasien::where('$nomedrec', '=', $nomedrec);
		return View::make('registrasi.search_registrasi');
	}

	/*public function postSearch()
	{
		$nomedrec = Input::get('nomedrec');
		$pasien = Pasien::where('NoMedrec', =, $nomedrec )->get();

		return View::make('registrasi.index_registrasi')->with()
	}*/
	public function index()
	{
		$nomedrec 	= Input::get('nomedrec');
		$pegawai 	= Pegawai::where('IdPegawai', '=', '2')->first();
		$pasien 	= Pasien2::where('id_pasien', '=', $nomedrec)->get();
		$satuans 	= RegLab::orderBy('created_at', 'desc')->first();

		//$riwdiag = RiwayatDiagnosa::where('No')

		return View::make('registrasi.index3_registrasi')
		->with('pasien', $pasien)
		->with('pegawai', $pegawai)
		->with('satuans', $satuans);
	}

	public function lihat($nomedrec)
	{
		//$nomedrec 	= Input::get('nomedrec');
		$pegawai 	= Pegawai::where('IdPegawai', '=', '2')->first();
		$pasien 	= Pasien2::where('id_pasien', '=', $nomedrec)->get();
		$satuans 	= RegLab::orderBy('created_at', 'desc')->first();

		//$riwdiag = RiwayatDiagnosa::where('No')

		return View::make('registrasi.index3_registrasi')
		->with('pasien', $pasien)
		->with('pegawai', $pegawai)
		->with('satuans', $satuans);
	}

	public function indexx()
	{
		$nomedrec 	= Input::get('nomedrec');
		$pegawai 	= Pegawai::where('IdPegawai', '=', '2')->first();
		$pasien 	= Pasien2::where('id_pasien', 'LIKE', '%'.$nomedrec.'%')->paginate(10);
		$pasiennama	= Pasien2::where('nama', 'LIKE', '%'.$nomedrec.'%')->paginate(10);
		$satuans 	= RegLab::orderBy('created_at', 'desc')->first();

		return View::make('registrasi.index4_registrasi')
		->with('pasien', $pasien)
		->with('pegawai', $pegawai)
		->with('pasiennama', $pasiennama)
		->with('satuans', $satuans);
	}

	public function index2($noreglab)
	{
		$reglab 		= RegLab::where('NoReglab', '=', $noreglab)->first();
		//$idpemeriksaan	= Pemeriksaan::orderBy('id', 'desc')->pluck('id');
		$riwdiag 		= RiwayatDiagnosa::where('NoRegLab', '=', $noreglab)->paginate(10);
		$pemeriksaan 	= Pemeriksaan2::where('NoRegLab', '=', $noreglab)->paginate(10);
		$lab 			= Lab::all();

		return View::make('registrasi.index2_registrasi')
		->with('reglab', $reglab)
		->with('pemeriksaan', $pemeriksaan)
		->with('riwdiag', $riwdiag)
		->with('lab', $lab);
	}

	public function store2()
	{

		$nomedrec = Input::get('no_medrec');
		//$idpegawai = Input::get('id_pegawai');
		$idpegawai = Auth::user()->IdPegawai;
		$pasien = Pasien2::where('id_pasien', '=', $nomedrec)->first();
		//$idpegawai = User::with('')

		/*$input = Pegawai::where('IdPegawai', '=', $idpegawai)->first();
		$input->pasien()->attach($pasien->NoMedrec);*/

		//$pasien->pegawai()->getRelatedIds();
		$pasien->pegawai()->attach($idpegawai);
		//$pasien->pegawai()->getRelatedIds();
		//$pasien->push();
		//Session::flash('message', 'Pasien Berhasil Terdaftar');
		
		$noreglab 		= RegLab::orderBy('created_at', 'desc')->pluck('NoRegLab');
		$reglab 		= Reglab::where('NoRegLab', '=', $noreglab)->first();
		$riwdiag 		= RiwayatDiagnosa::where('NoRegLab', '=', $noreglab)->get();
		$pemeriksaan 	= Pemeriksaan2::where('NoRegLab', '=', $noreglab)->get();
		$lab 			= Lab::all();

		//$reglab = DB::connection('mysql')->reglab->lastInsertId();
		//return Redirect::to('registrasi/search');
		return View::make('registrasi.index2_registrasi')
		->with('reglab', $reglab)
		->with('riwdiag', $riwdiag)
		->with('noreglab', $noreglab)
		->with('pemeriksaan', $pemeriksaan)
		->with('lab', $lab);
		//->with('reglab', $reglab);
	}

	public function store()
	{
		
		$nomedrec 		= Input::get('no_medrec');
		$tgl_reg 		= Input::get('tgl_reg');
		$sasaran 		= Input::get('sasaran');
		//$idpegawai = Input::get('id_pegawai');
		$idpegawai 		= Auth::user()->IdPegawai;
		$pasien 		= Pasien2::where('id_pasien', '=', $nomedrec)->first();
		$nomorreglab 	= Input::get('noreglab');
		$pivotData 		= array($idpegawai => array('tgl_reg'=>$tgl_reg, 'Keterangan'=>$sasaran));
		//$idpegawai = User::with('')

		/*$input = Pegawai::where('IdPegawai', '=', $idpegawai)->first();
		$input->pasien()->attach($pasien->NoMedrec);*/

		//$pasien->pegawai()->getRelatedIds();
		$pasien->pegawai()->attach($pivotData);
		
		$noreglab 		= RegLab::orderBy('created_at', 'desc')->pluck('NoRegLab');

		$this->billing->NoRegLab = $noreglab;
		$this->billing->save();
		//$input = Input::all();
	   	//$this->billing->simpan($input);
		
		//$pasien->pegawai()->getRelatedIds();
		//$pasien->push();
		//Session::flash('message', 'Pasien Berhasil Terdaftar');
		
		$noreglab 		= RegLab::orderBy('created_at', 'desc')->pluck('NoRegLab');
		$reglab 		= Reglab::where('NoRegLab', '=', $noreglab)->first();
		$riwdiag 		= RiwayatDiagnosa::where('NoRegLab', '=', $noreglab)->get();
		$pemeriksaan 	= Pemeriksaan2::where('NoRegLab', '=', $noreglab)->get();
		$lab 			= Lab::all();

		//$reglab = DB::connection('mysql')->reglab->lastInsertId();
		//return Redirect::to('registrasi/search');
		return View::make('registrasi.index2_registrasi')
		->with('reglab', $reglab)
		->with('riwdiag', $riwdiag)
		->with('noreglab', $noreglab)
		->with('pemeriksaan', $pemeriksaan)
		->with('lab', $lab);
		//->with('reglab', $reglab);
	}
}
?>