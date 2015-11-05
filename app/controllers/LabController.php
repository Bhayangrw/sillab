<?php
	
	class LabController extends \BaseController {
		
		public function __construct(){
			
			$this->lab = new Lab();
			$this->jnskategori = new Jnskategori();
			$this->tarif = new Tarif();
		}
		
		public function index()
		{
			$labs = Lab::paginate(10);
			return View::make('lab.labs', compact('labs'));
		}
		
		// Fungsi tambah data 
		public function create()
		{
			$labs  = DB::table('lab')->orderBy('KdLab', 'dsc')->first();
			return View::make('lab.create_lab')->with('labs',$labs);
		}
		public function handleCreate()
		{
			$validator = Validator::make($input = Input::all(), Lab::$rules, Lab::$messages);
			
			if ($validator->fails()) {
				$messages = $validator->messages();
				
				return Redirect::to('/labs/create')->withErrors($validator)->withInput(Input::all());
				} else {
				$this->lab->simpan($input);
				return Redirect::to('labs/create')->with('register_success', 'Tambah data berhasil disimpan !');
			}
		}
		
		//Fungsi edit data
		public function edit($KdLab)
		{
			$lab = Lab::find($KdLab);
			return View::make('lab.edit_lab')->with('lab', $lab);
		}
		
		public function handleEdit()
		{
			$input = Input::all();
			$this->lab->handleEdit($input);
			return Redirect::to('labs');
		}
		
		//Fungsi hapus
		public function hapus($KdLab,$KdLabCurrent)
		{
			/* $users  = DB::table('users')
			->select(DB::raw('count(*) as count'))
			->where('KdLab' ,'=', $KdLab)->get();
			
			foreach ($users as $user)
			{
				var_dump($user->count);
			}
			
			if (($user->count) != 0 )
			{
				return Redirect::to('labs')->with('register_success', 'Maaf data laboratorium tidak dapat dihapus karena anda login');
			}
			else
			{
				//$this->lab->hapus($KdLab);
				return Redirect::to('labs')->with('register_success', 'ni udah dihapus');;
			} */
			
		
			if (($KdLabCurrent) == $KdLab )
			{
				return Redirect::to('labs')->with('register_error', 'Maaf data laboratorium tidak dapat dihapus karena anda login pada laboratorium yang sama');
			}
			else
			{
				$this->lab->hapus($KdLab);
				return Redirect::to('labs')->with('register_success', 'Data Laboratorium berhasil dihapus');;
			}
			
			
		}
	}		