<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Services\Users\UserService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function ShowLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }


    public function login(LoginRequest $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password,])) {

            return redirect()->route('login')->with('error', 'The Email Or Password Is Incorrect !!!');
        }
        return redirect()->route('show-dashboard');
    }

    public function register(EmailRequest $request, UserService $user)
    {

        $user->CreateUser($request->validated());
        return redirect()->route('login');
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
