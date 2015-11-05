<?php

class PemeriksaanController extends BaseController
{	

	public function __construct()
	{
		$this->pemeriksaan = new Pemeriksaan2;
		$this->harga 	= new Tarif();
	}

	public function create()
	{
		$jnskategoris	= Jnskategori::all();
		$noreglab		= RegLab::where('NoRegLab', '=', Input::get('noreglab1'))->first();
		$lab 			= Lab::all();
		//$jnskategoris 	= Jnskategori::where('KdLab', '=', $lab)->get();

		return View::make('pemeriksaan.create_pemeriksaan')
		->with('jnskategoris', $jnskategoris)
		->with('noreglab', $noreglab)
		->with('lab', $lab);
	}

	public function create2()
	{
		$kdtarif		= Input::get('kdtarif');
		$jnskategoris	= Jnskategori::all();
		$noreglab		= RegLab::where('NoRegLab', '=', Input::get('noreglab1'))->first();
		$lab 			= Input::get('lab');
		$tarif 			= Tarif::where('KdLab', '=', $lab)
							->get();
		
		//$jnskategoris 	= Jnskategori::where('KdLab', '=', $lab)->get();

		return View::make('pemeriksaan.create_pemeriksaan')
				->with('jnskategoris', $jnskategoris)
				->with('noreglab', $noreglab)
				->with('tarif', $tarif);
	}

	/*public function showharga($value)
	{
		$data['harga']	= $this->harga->getDataharga($value);
		
		return View::make('pemeriksaan.harga')
					->with('data', $data);
	}*/

	public function ambil($ID_LAB)
	{
		return View::make('pemeriksaan')
		->with('ID_LAB', $ID_LAB);
	}

	public function store()
	{
		$reglab 		= RegLab::where('NoReglab', '=', Input::get('noreglab'))->first();
		$kdjnskategori	= Input::get('kdjnskategori');
		$noreglab 		= Input::get('noreglab');

		$reglab->jnskategori()->attach($kdjnskategori);

		$idpemeriksaan	= Pemeriksaan2::orderBy('id', 'desc')->pluck('id');
		$riwdiag 		= RiwayatDiagnosa::where('NoRegLab', '=', Input::get('noreglab'))->paginate();
		$pemeriksaan 	= Pemeriksaan2::where('NoRegLab', '=', Input::get('noreglab'))->paginate();
		$lab 			= Lab::all();

		return View::make('registrasi.index2_registrasi')
		->with('reglab', $reglab)
		->with('pemeriksaan', $pemeriksaan)
		->with('riwdiag', $riwdiag)
		->with('lab', $lab);
	}

	public function store2()
	{
		$kdtarif		= Input::get('kdtarif');
		$noreglab 		= Input::get('noreglab');
		$harga2 		= Tarif::select('Harga')->where('KdTarif', '=', $kdtarif)->get();

		foreach ($harga2 as $key) {
			$harga = $key->Harga;
		}

		$reglab 		= RegLab::where('NoReglab', '=', $noreglab)->first();
		$pivotData 		= array($kdtarif => array('Harga'=>$harga));
		

		$reglab->tarif()->attach($pivotData);

		
		$idpemeriksaan	= Pemeriksaan2::orderBy('id', 'desc')->pluck('id');
		$riwdiag 		= RiwayatDiagnosa::where('NoRegLab', '=', Input::get('noreglab'))->paginate();
		$pemeriksaan 	= Pemeriksaan2::where('NoRegLab', '=', Input::get('noreglab'))->paginate();
		$lab 			= Lab::all();

		return View::make('registrasi.index2_registrasi')
		->with('reglab', $reglab)
		->with('pemeriksaan', $pemeriksaan)
		->with('riwdiag', $riwdiag)
		->with('lab', $lab);
	}

	public function hapus($id, $noreglab)
	{
		$this->pemeriksaan->hapus($id);

		$reglab 		= RegLab::where('NoRegLab', '=', $noreglab)->first();
		$idpemeriksaan 	= Pemeriksaan2::orderBy('id', 'desc')->pluck('id');
		$pemeriksaan 	= Pemeriksaan2::where('NoRegLab', '=', $noreglab)->paginate();
		$riwdiag 		= RiwayatDiagnosa::where('NoRegLab', '=', $noreglab)->paginate();
		$lab 			= Lab::all();

		return View::make('registrasi.index2_registrasi')
		->with('reglab', $reglab)
		->with('pemeriksaan', $pemeriksaan)
		->with('riwdiag', $riwdiag)
		->with('lab', $lab);		
	}
}
?>