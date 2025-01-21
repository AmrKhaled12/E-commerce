<?php

namespace App\Http\Controllers\auth;

use App\Classes\GenerateUser;
use App\Classes\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\ParentCategory;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function ShowLogin(){
        return view('auth.login');
    }

    public function showRegister(){
        return view('auth.register');
    }


   public function login(LoginRequest $request){
   if (!Auth::attempt(['email' =>$request->email, 'password' => $request->password,])){

       return redirect()->route('login')->with('error', 'The Email Or Password Is Incorrect !!!');     
   }
    $user=new GenerateUser();
    $user->GenerateUserData();
    $userData=$user->GetUserData();
    session(['userdata'=>$userData]);
    return redirect()->route('show-dashboard');
    
    }
    
    public function register(EmailRequest $request){

        UserService::CreateUser($request->validated());
            return redirect()->route('login');

    }

    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }

}