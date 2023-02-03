<?php

namespace App\Http\Controllers;

use App\Services\UserInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function login(): Response
    {
        return response()->view('user.login', [
            'title' => 'LOGIN'
        ]);
    }

    public function doLogin(Request $request): Response
    {
        $username = $request->input('user');
        $password = $request->input('password');

        if(empty($username) || empty($password)){
            return response()->view('user.login', [
                'title' => 'LOGIN',
                'error' => 'User or Password is required'
            ]);
        }

        if($this->userInterface->login($username, $password)){
            $request->session()->put('user', $username);
            return redirect('/');
        }

        return response()->view('user.login', [
            'title' => 'LOGIN',
            'error' => 'User or Password wrong'
        ]);
    }

    public function doLogout()
    {

    }
}
