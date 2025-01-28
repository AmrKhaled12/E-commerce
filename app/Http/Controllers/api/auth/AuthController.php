<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Claims\JwtId;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
   public function login(Request $request){
      $validUser=Validator::make($request->only(['email','password']),[
         'email' => 'required|exists:users,email',
         'password' => 'required|min:6'
      ]);
      if ($validUser->fails()) {
         return response()->json($validUser->errors(), 404);
     }

   $token=auth('api')->attempt($validUser->validated());
       if(!$token){
         return response('error',404);
        }
        $user=Auth::guard('api')->user();
        $user->userToken=$token;
        return response()->json($user);
   }


   public function logout(Request $request){
      $token=$request->header('user-token');
      if(!$token){
         return response('some thing wrong');
      }
     try{ 
      JWTAuth::setToken($token)->invalidate();
      return response()->json(['message'=>'you are logout']);
      }
   catch(\tymon\JWTAuth\Exceptions\TokenInvalidException $e){
      return $e->getMessage();
   }
   }
}
