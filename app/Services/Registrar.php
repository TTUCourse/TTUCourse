<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'fname' => 'required|max:255',
			'lname' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:8',
			'sex' => 'required|max:4',
			'grade' => 'required|max:1',
			'department' => 'required|max:1',
			'nickname' => 'required|max:255',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'fname' => $data['fname'],
			'lname' => $data['lname'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'sex' => $data['sex'],
			'grade' => $data['grade'],
			'department' => $data['department'],
			'nickname' => $data['nickname'],
		]);
	}

}
