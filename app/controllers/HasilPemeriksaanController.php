<?php

class HasilPemeriksaanController extends BaseController
{

	public function searching()
	{
		return View::make('hasilpemeriksaan.search_hasilpemeriksaan');
	}

	public function index()
	{
		$pemeriksaan1 = Pemeriksaan2::where('NoRegLab', '=', Input::get('noreglab'))->get();
		$pemeriksaan2 = Pemeriksaan2::where('NoRegLab', '=', Input::get('noreglab'))->paginate();
		$reglab 	  = RegLab::where('NoRegLab', '=', Input::get('noreglab'))->first();

		return View::make('hasilpemeriksaan.index_hasilpemeriksaan')
		->with('pemeriksaan1', $pemeriksaan1)
		->with('pemeriksaan2', $pemeriksaan2)
		->with('reglab', $reglab);
	}

	public function indexx()
	{
		$noreglab 		= Input::get('noreglab');
		$pemeriksaan1 	= Pemeriksaan2::where('NoRegLab', '=', Input::get('noreglab'))->get();
		$pemeriksaan2 	= Pemeriksaan2::where('NoRegLab', '=', Input::get('noreglab'))->paginate();
		$reglab			= RegLab::where('NoRegLab', 'LIKE', '%'.$noreglab.'%')->orderBy('tgl_reg', 'desc')->paginate();
		$regnama 		= Pasien2::where('nama', 'LIKE', '%'.$noreglab.'%')->paginate();

		return View::make('hasilpemeriksaan.index3_hasilpemeriksaan')
		->with('pemeriksaan1', $pemeriksaan1)
		->with('pemeriksaan2', $pemeriksaan2)
		->with('reglab', $reglab)
		->with('regnama', $regnama);
	}

	public function lihatnama($nomedrec)
	{
		//$reglab 	  	= RegLab::where('NoRegLab', '=', $noreglab)->first();
		$pasien 		= RegLab::where('id_pasien', '=', $nomedrec)->orderBy('tgl_reg', 'desc')->paginate(); 	

		return View::make('hasilpemeriksaan.index4_hasilpemeriksaan')
		//->with('reglab', $reglab)
		->with('pasien', $pasien);
	}

	public function lihat($noreglab)
	{
		$pemeriksaan1 = Pemeriksaan2::where('NoRegLab', '=', $noreglab)->get();
		$pemeriksaan2 = Pemeriksaan2::where('NoRegLab', '=', $noreglab)->paginate();
		$reglab 	  = RegLab::where('NoRegLab', '=', $noreglab)->first();

		return View::make('hasilpemeriksaan.index_hasilpemeriksaan')
		->with('pemeriksaan1', $pemeriksaan1)
		->with('pemeriksaan2', $pemeriksaan2)
		->with('reglab', $reglab);
	}

	public function index2($noreglab)
	{
		$pemeriksaan1 = Pemeriksaan2::where('NoRegLab', '=', $noreglab)->get();
		$pemeriksaan2 = Pemeriksaan2::where('NoRegLab', '=', $noreglab)->paginate();
		$reglab 	  = RegLab::where('NoRegLab', '=', $noreglab)->first();

		return View::make('hasilpemeriksaan.index_hasilpemeriksaan')
		->with('pemeriksaan1', $pemeriksaan1)
		->with('pemeriksaan2', $pemeriksaan2)
		->with('reglab', $reglab);
	}

	public function edit($id, $noreglab)
	{
		$pemeriksaan = Pemeriksaan2::find($id);
		$reglab 	 = RegLab::where('NoRegLab', '=', $noreglab)->first();

		return View::make('hasilpemeriksaan.edit_hasilpemeriksaan')
		->with('pemeriksaan', $pemeriksaan)
		->with('reglab', $reglab);
	}

	public function edit2($noreglab)
	{
		$pemeriksaan1 = Pemeriksaan2::find($noreglab);
		$pemeriksaan = Pemeriksaan2::where('NoRegLab', '=', $noreglab)->get();
		$reglab 	  = RegLab::where('NoRegLab', '=', $noreglab)->first();

		return View::make('hasilpemeriksaan.edit2_hasilpemeriksaan')
		->with('pemeriksaan', $pemeriksaan)
		->with('reglab', $reglab);
	}

	public function update($id, $noreglab)
	{
		$pemeriksaan = Pemeriksaan2::find($id);
		$pemeriksaan -> HasilPeriksa = Input::get('hasilperiksa');
		$pemeriksaan -> Ket_Hasil = Input::get('kethasil');
		$pemeriksaan -> save();

		$pemeriksaan2 = Pemeriksaan2::where('NoRegLab', '=', $noreglab)->paginate();
		$reglab 	  = RegLab::where('NoRegLab', '=', $noreglab)->first();

		return View::make('hasilpemeriksaan.index_hasilpemeriksaan')
		->with('pemeriksaan2', $pemeriksaan2)
		->with('reglab', $reglab);		
	}

	public function update2($noreglab)
	{
		$pemeriksaan = Pemeriksaan2::where('NoRegLab', '=', $noreglab)->get();
		foreach($pemeriksaan as $key)
		{
			$pemeriksaan -> HasilPeriksa = Input::get('hasilperiksa');
			$pemeriksaan -> Ket_Hasil = Input::get('kethasil');
			$pemeriksaan -> save();
		}

		$pemeriksaan2 = Pemeriksaan2::where('NoRegLab', '=', $noreglab)->paginate()->desc('tgl_reg');
		$reglab 	  = RegLab::where('NoRegLab', '=', $noreglab)->first();

		return View::make('hasilpemeriksaan.index_hasilpemeriksaan')
		->with('pemeriksaan2', $pemeriksaan2)
		->with('reglab', $reglab);	
	}

	public function detil($noreglab)
	{
		$pemeriksaan 	= Pemeriksaan2::where('NoRegLab', '=', $noreglab)->paginate();
		$reglab 		= RegLab::where('NoRegLab', '=', $noreglab)->first();
		$subkategori 	= SubKategori::all();

		return View::make('hasilpemeriksaan.detil2_hasilpemeriksaan')   
		->with('pemeriksaan', $pemeriksaan)
		->with('reglab', $reglab)
		->with('subkategori', $subkategori);
	}
}
?>