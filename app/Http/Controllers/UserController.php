<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(Request $request, $driver = null) 
    {
    	$data = $this->userService->registerNewUser($request, $driver);

    	if($data) {
    		return response()->createSuccess($data);
    	}

    	return response()->error("Não foi possível cadastrar o seu usuário, tente novamente mais tarde!");
    }
}
