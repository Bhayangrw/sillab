<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//login
Route::get('test', function()
{
	$kelurahan = Kelurahan::all();
	$kepalaKeluarga = KepalaKeluarga::where('nama_kk', '=', 'Helmi')->first();

	return $kepalaKeluarga->kelurahan->nama_kelurahan;
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('logout', array('uses' => 'UserController@logout'));
	// Route yang ingin diproteksi simpan disini

	Route::get('/', function()
	{
		date_default_timezone_set("Asia/Bangkok");
		$tgl_reg = date("Y-m-d");
		$transdat = DB::table('v_datapasien')->where('tgl_reg', '=', $tgl_reg)->count();
		$transbil = Billing::where('tgl_reg', '=', $tgl_reg)->count();
		$transruj = ViewRujukandetail::where('tgl_reg', '=', $tgl_reg)->count();
		return View::make('index', compact('transbil','transruj','transdat'));
	});

	//dashboard
	Route::get('dashboard', 'DashboardController@index');
	
	//profile
	Route::get('profile', 'ProfileController@index');
	
	//bantuan
	Route::get('bantuan', 'BantuanController@index');

	//Satuan
	Route::get('satuan', 'SatuanController@index');
	Route::get('satuan/create', 'SatuanController@create');
	Route::post('satuan/create', 'SatuanController@handleCreate');
	Route::get('satuan/edit/{KdSatuan}', 'SatuanController@edit');
	Route::post('satuan/edit', 'SatuanController@handleEdit');
	Route::get('satuan/hapus/{KdSatuan}', 'SatuanController@hapus');
	Route::get('satuan/detail/{KdSatuan}', 'SatuanController@detail');

	//Jenis Kategori
	Route::get('jnskategoris', 'JnskategoriController@index');
	Route::get('jnskategoris/create', 'JnskategoriController@create');
	Route::post('jnskategoris/create', 'JnskategoriController@handleCreate');
	Route::get('jnskategoris/edit/{KdJnsKategori}', 'JnskategoriController@edit');
	Route::post('jnskategoris/edit', 'JnskategoriController@handleEdit');
	Route::get('jnskategoris/hapus/{KdJnsKategori}', 'JnskategoriController@hapus');

	//halaman kategoris
	Route::get('kategoris', 'KategoriController@index');
	Route::get('kategoris/create', 'KategoriController@create');
	Route::post('kategoris/create', 'KategoriController@handleCreate');
	Route::get('kategoris/edit/{KdKategori}', 'KategoriController@edit');
	Route::post('kategoris/edit', 'KategoriController@handleEdit');
	Route::get('kategoris/hapus/{KdKategori}', 'KategoriController@hapus');

	//halaman sub-kategoris
	Route::get('subkategoris', 'SubkategoriController@index');
	Route::get('subkategoris/create', 'SubkategoriController@create');
	Route::post('subkategoris/create', 'SubkategoriController@handleCreate');
	Route::get('subkategoris/edit/{SubKdKategori}', 'SubkategoriController@edit');
	Route::post('subkategoris/edit', 'SubkategoriController@handleEdit');
	Route::get('subkategoris/hapus/{SubKdKategori}', 'SubkategoriController@hapus');
	
	//halaman billing
	Route::get('billings','BillingController@index');
	Route::get('billings/rekapbil','BillingController@rekapbil');
	Route::get('billings/rekapbildetail', 'BillingController@rekapbildetail');
	Route::get('billings/edit/{NoRegLab}', 'BillingController@status');
	Route::get('billings/edit/{NoRegLab}/{StatusPembayaran}', 'BillingController@status2');
	Route::get('billings/detail/{NoRegLab}', 'BillingController@detail');
	Route::get('billings/filter','BillingController@filter');
	Route::get('billings/filterreglab','BillingController@filterReglab');
	Route::get('billings/filter/{tgl_reg}','BillingController@filterindex');
	
	//halaman tarif
	Route::get('tarifs', 'TarifController@index');
	Route::get('tarifs/create', 'TarifController@create');
	Route::post('tarifs/create', 'TarifController@handleCreate');
	Route::get('tarifs/edit/{KdTarif}', 'TarifController@edit');
	Route::get('tarifs/detail/{KdLab}', 'TarifController@detail');
	Route::post('tarifs/edit', 'TarifController@handleEdit');
	Route::get('tarifs/hapus/{KdTarif}', 'TarifController@hapus');
	Route::get('tarifs/filter', array('as'=>'filtertarif', 'uses'=>'TarifController@filter'));
	
	//halaman lab
	Route::get('labs', 'LabController@index');
	Route::get('labs/create', 'LabController@create');
	Route::post('labs/create', 'LabController@handleCreate');
	Route::get('labs/edit/{KdLab}', 'LabController@edit');
	Route::post('labs/edit', 'LabController@handleEdit');
	Route::get('labs/hapus/{KdLab}/{KdLabCurrent}', 'LabController@hapus');
	
	//halaman rujukan
	Route::get('rujukan', 'RujukanController@index');
	Route::get('rujukan/create/{noreglab}',array('as'=>'createrujukan', 'uses'=>'RujukanController@create'));
	//Route::get('rujukan/create/{NoRegLab}', 'RujukanController@create');
	Route::get('rujukan/filter', 'RujukanController@filter');
	Route::get('rujukan/filterrujukan', 'RujukanController@filterrujukan');
	Route::post('rujukan/create', 'RujukanController@handleCreate');
	Route::get('rujukan/edit/{NmrSpesimen}', 'RujukanController@edit');
	Route::post('rujukan/edit', 'RujukanController@handleEdit');
	Route::get('rujukan/hapus/{NmrSpesimen}', 'RujukanController@hapus');
	Route::get('rujukan/detail/{NmrSpesimen}', 'RujukanController@detail');
	Route::get('rujukan/filter/{tgl_reg}','RujukanController@filterindex');
	Route::get('rujukan/index/{noreglab}', array('as'=>'indexrujukan', 'uses'=>'RujukanController@indexx'));
	
	//halaman grafik
	Route::get('grafik',array('as' => 'grafik', 'uses' => 'GrafikController@index'));

	//History
	Route::get('history','HistoryController@find');
	Route::get('history/detail/{Id_Pasien}','HistoryController@detail');
	Route::get('history/{noreglab}', array('as'=>'editreg', 'uses'=>'HistoryController@edit'));

	//halaman laporan
	Route::get('lapregistrasi', 'LapregistrasiController@index');
	Route::get('lapregistrasi/cari', 'LapregistrasiController@cari');
	Route::get('lappemeriksaan', 'LappemeriksaanController@index');
	Route::get('laprujukan', 'LaprujukanController@index');
	Route::get('lapekspedisi', 'LapekspedisiController@index');
	Route::get('lapekspedisi/find', 'LapekspedisiController@find');
	Route::get('laptest', 'LaptestController@index');
	Route::get('laptest/detail', 'LaptestController@detail');

	//Bagian Sub-Registrasi dan Hasil Pemeriksaan
	//Registrasi
	Route::get('registrasi/search', array('as'=>'searchregistrasi', 'uses'=>'RegistrasiController@searching'));
	Route::post('registrasi/index', array('as'=>'indexregistrasi', 'uses'=>'RegistrasiController@indexx'));
	Route::post('registrasi/post', array('as'=>'postregistrasi', 'uses'=>'RegistrasiController@store'));
	Route::get('registrasi/index/{noreglab}', array('uses'=>'RegistrasiController@index2'));
	Route::get('registrasi/index/pasien/{nomedrec}', array('as'=>'indexreg','uses'=>'RegistrasiController@lihat'));

	//Riwayat Diagnosa
	Route::post('registrasi/riwdiag/create', array('as'=>'createriwdiag', 'uses'=>'RiwayatDiagnosaController@create'));
	Route::post('registrasi/riwdiag/create/store', array('uses'=>'RiwayatDiagnosaController@store'));
	Route::get('registrasi/riwdiag/create/hapus/{id}/{noreglab}', array('as'=>'hapusriwdiag','uses'=>'RiwayatDiagnosaController@hapus'));

	//Pemeriksaan
	Route::post('registrasi/pemeriksaan/create', array('as'=>'createpemeriksaan', 'uses'=>'PemeriksaanController@create2'));
	Route::get('registrasi/pemeriksaan/create/{ID_LAB}', array('as'=>'ambiljnskategori', 'uses'=>'PemeriksaanController@ambil'));
	Route::post('registrasi/pemeriksaan/create/store', array('uses'=>'PemeriksaanController@store2'));
	Route::get('registrasi/pemeriksaan/create/hapus/{id}/{noreglab}', array('as'=>'hapuspemeriksaan', 'uses'=>'PemeriksaanController@hapus'));
	Route::get('registrasi/pemeriksaan/create/detil/{noreglab}', array('as'=>'detilpemeriksaan', 'uses'=>'HasilPemeriksaanController@detil'));
	
	//Hasil Pemeriksaan
	Route::get('hasilpemeriksaan/search', array('as'=>'searchpemeriksaan', 'uses'=>'HasilPemeriksaanController@searching'));
	Route::post('hasilpemeriksaan/index', array('as'=>'indexhasilpemeriksaan', 'uses'=>'HasilPemeriksaanController@indexx'));
	Route::get('hasilpemeriksaan/index/{noreglab}', array('as'=>'indexpemeriksaan', 'uses'=>'HasilPemeriksaanController@index2'));
	Route::get('hasilpemeriksaan/edit/{id}/{noreglab}', array('as'=>'edithasilpemeriksaan', 'uses'=>'HasilPemeriksaanController@edit'));
	//Route::get('hasilpemeriksaan/edit/{noreglab}', array('as'=>'edithasilpemeriksaan', 'uses'=>'HasilPemeriksaanController@edit2'));
	Route::post('hasilpemeriksaan/edit/update/{id}/{noreglab}', array('uses'=>'HasilPemeriksaanController@update'));
	Route::get('hasilpemeriksaan/index/pemeriksaan/{noreglab}', array('as'=>'indexpem', 'uses'=>'HasilPemeriksaanController@lihat'));
	Route::get('hasilpemeriksaan/index/pemeriksaan/nama/{nomedrec}', array('as'=>'indexnam', 'uses'=>'HasilPemeriksaanController@lihatnama'));
	//Route::post('hasilpemeriksaan/edit/update/{noreglab}', array('uses'=>'HasilPemeriksaanController@update2'));

});

Route::get('login', array('uses' => 'UserController@login'));
Route::post('login', array('uses' => 'UserController@doLogin'));






