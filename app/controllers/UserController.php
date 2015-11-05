<?php
 
class UserController extends \BaseController {
	
	public function __construct(){
		$this->user = new User();
	}
	
    public function login()
    {
		$user = User::all();
		return View::make('login');
    }
 
    public function doLogin()
    {
        $rules = array(
			'email'    => 'required|email',
			'password' => 'required|alphaNum|min:5'
        );
		
		$messages = array(
			'email.required' => 'Kolom email harus di isi!',
			'password.required' => 'Kolom password harus di isi!',
		);

        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
			} 
			else 
				{
				$userdata = array(
									'email'   	=> Input::get('email'),
									'password'  => Input::get('password') 
								 );
			
					if (Auth::attempt($userdata)) {
						return Redirect::to('/');
							} 
							else 
							{
								return Redirect::to('login');
							}
				}
    }
 
    public function logout()
    {
        Auth::logout();
        return Redirect::to('login');
    }
 
}