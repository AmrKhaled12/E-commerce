<?php

use App\Http\Controllers\crud\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('show-login');
Route::get('/registration', function () {
    return view('auth.register');
})->name('show-register');

Route::group(['prefix'=>'auth','middelware'=>''],function(){
    Route::post('/dashboard',[AuthController::class,'login'])->name('login');
    Route::post('/register',[AuthController::class,'register'])->name('register');
    Route::get('/logout',[AuthController::class,'logout']);
});
