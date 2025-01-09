<?php

namespace App\Http\Controllers\crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\ParentCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function login(LoginRequest $request){
   if (!Auth::attempt(['email' =>$request->email, 'password' => $request->password,])){

       return redirect()->route('show-login')->with('error', 'The Email Or Password Is Incorrect !!!');     
   }
   
    $name=$request->query('name');
    if($name){
        $category=ParentCategory::with('chaild')->when('name','Like',"%{$name}%")->paginate(6);
    }

    $category=ParentCategory::with('chaild')->paginate(6);
    $user=Auth::user();
    return view('dashboard.user')->with(['user'=>$user,'categories'=>$category]);

    // $user = User::where(['email' => $request->email, 'password' =>$request->password])->first();

    // // Auth::login($user);
    //     if (collect($user)->isEmpty())

    //         return redirect()->route('show-login')->with('error', 'The Email Or Password Is Incorrect !!!');

    //     else {

    //         // $_SESSION['login'] = 'on';
    //         return view('dashboard.user')->with('user',$user);
    //     }   
    }
    
    public function register(EmailRequest $request){
        DB::table('users')->insert([
            'name'     =>     $request->name,
            'password' =>     Hash::make( $request->password ),
            'email'    =>     $request->email,
            'phone'    =>     $request->phone,
        ]);
            return redirect()->route('show-login');

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('show-login');
    }

}