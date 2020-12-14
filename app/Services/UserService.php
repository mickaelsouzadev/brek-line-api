<?php  

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepositoryInterface as UserRepository;
use App\Services\AuthService;

class UserService 
{
	private $userRepository;
	private $authService;

	public function __construct(UserRepository $userRepository, AuthService $authService)
	{
		$this->userRepository = $userRepository;
		$this->authService = $authService;
	}

	public function loginUser($request)
	{
		return $this->authService->authenticateUser($request->all());
	}

	public function registerNewUser($request, $driver)
	{

		if(isset($driver)) {
			return $this->createUserBySocialLogin($request, $driver);
		}

		return $this->createUser($request);
	}

	private function createUser($request) 
	{
		$user = $this->userRepository->create($request->all());

		if($user) {
			return $this->authService->createUserAuthToken($user);
		}

		return false;
	}

	private function createUserBySocialLogin($request, $driver)
	{
		$social_user_data = $this->authService->getSocialUserData($request->input('access_token'), $driver);

		foreach ($social_user_data as $key => $value) {
			$request->merge([$key => $value]);
		}

		// return $this->createUser($request);

		return $social_user_data;
	}


}