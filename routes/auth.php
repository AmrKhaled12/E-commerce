<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/auth/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');

Route::group(['prefix'=>'auth','middleware'=>'guest'],function(){
    Route::get('/registration',[AuthController::class,'showRegister'])->name('show-register');
    Route::get('/login',[AuthController::class,'showLogin'])->name('login');
    Route::post('/dashboard',[AuthController::class,'login'])->name('post-login');
    Route::post('/register',[AuthController::class,'register'])->name('register');
    
});
