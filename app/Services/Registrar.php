<?php namespace App\Services;

use App\Events\PopulateUserContentOptions;
use App\User;
use Illuminate\Support\Facades\Event;
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
			'username' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
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
		$user = User::create([
			'username' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			//subscriber user
			'usertype_id' => 2
		]);
        //register web page default options and profile
		Event::fire(new PopulateUserContentOptions($user->id));
		return $user;
	}

}
