<?php

use App\Http\Controllers\api\category\CategoryController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'/category',],function(){
    Route::get('/show-category',[CategoryController::class,'showCategory']);
});