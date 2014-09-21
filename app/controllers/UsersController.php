<?php 

class UsersController extends BaseController{
	protected $layout = "layouts.main";


	public function __construct()
	{
		
		$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}

	public function getLogin()
	{
		$this->layout->content = View::make('main/login');
	}

	public function getLogout() 
	{
    	Auth::logout();
    	Session::flush();

    	return Redirect::to('/')->with('message', 'Du är nu utloggad!');
	}

	public function postSignin()
	{
		if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		{
			return Redirect::to('/')->with('message', 'You are in!');
		}
		else
		{
			return Redirect::to('users/login')
			->with('message', 'Your username or password was incorrect')
			->withInput();
		}
	}
	
}
