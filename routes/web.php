<?php

use App\Http\Controllers\dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',function(){
    return view('dashboard.user');
})->name('dashboard');

Route::group(['prefix'=>'/dashboard'],function(){
    Route::get('/fillterion',[DashboardController::class,'GetFillterationCategories'])->name('fillteration');
});

