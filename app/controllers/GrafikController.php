<?php

class GrafikController extends \BaseController {
public function __construct(){
		$this->reglab = new Grafik();
	}
	public function index()
	{
		$carigrafik = Input::get('cari_grafik');
		$tahun = Input::get('tahun');
		$caritahun = DB::table('v_gkunjunganpasien')
					->groupBy('Year')
					->get();
		
		if (($carigrafik) == 1)
		{
			$reglab = DB::table('v_gkunjunganpasien')
						->select('Count','Month')
						->where('Year','=', $tahun)
						->orderBy('tgl_reg','ASC')
						->get();				 
		}

		else
		{
			$reglab = DB::table('v_grujukan')
					->select('Count','Month')
						->where('Year','=', $tahun)
						->orderBy('tgl_reg','ASC')
						->get();
		}

		return View::make('grafik.index_grafik', compact('reglab','carigrafik','tahun','caritahun'));
	}
	
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
