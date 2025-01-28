<?php

use App\Http\Controllers\api\category\CategoryController;
use App\Http\Controllers\api\auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);

Route::group(['prefix'=>'/category',],function(){
    Route::get('/show-category',[CategoryController::class,'showCategory']);
});
