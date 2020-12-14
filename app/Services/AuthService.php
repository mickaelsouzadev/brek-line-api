<?php  

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


class AuthService 
{

	public function authenticateUser($credentials) {

		if (Auth::attempt($credentials)) {

			$user = $this->userRepository->findUserByEmail($credentials['email']);

			return $this->createUserAuthToken($user);
 		}

 		return false;
	}

	public function getSocialUserData($access_token, $driver)
	{
		$social_user = Socialite::driver($driver)->userFromToken($access_token);

		// $social_user_data = [
		// 	'name' => $social_user['name'],
		// 	'email' => $social_user['email'],
		// 	'password' => Str::random(40)
		// ];

		return $social_user;
	}

	public function createUserAuthToken($user)
	{
		$token = $user->createToken('my-app-token')->plainTextToken;

		$data = [
			'user' => $user,
			'token' => $token
		];

		return $data;
		
	}


}
