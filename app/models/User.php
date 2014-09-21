<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {


	public static $rules = array(
		'firstname'		=> 'required|alpha|min:2',
		'lastname'		=> 'required|alpha|min:2',
		'email'			=> 'required|unique:users',
		'password'		=> 'required|alpha_num|between:6,12|confirmed',
		'password_confirmation'	=> 'required|alpha_num|between:6,12'
		);

	// public static $rules = array(
 //    'firstname'=>'required|alpha|min:2',
 //    'lastname'=>'required|alpha|min:2',
 //    'email'=>'required|email|unique:users',
 //    'password'=>'required|alpha_num|between:6,12|confirmed',
 //    'password_confirmation'=>'required|alpha_num|between:6,12'
 //    );

	public function getRememberToken()
{
    return $this->remember_token;
}

public function setRememberToken($value)
{
    $this->remember_token = $value;
}

public function pictures()
{

	return $this->hasMany('Inventory', 'users_id');
}

public function getRememberTokenName()
{
    return 'remember_token';
}

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
