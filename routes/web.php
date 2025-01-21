<?php

use App\Http\Controllers\Ads\AdController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\ProductController;


Route::get('/',[DashboardController::class,'showDashboard'])->name('show-dashboard');
Route::group(['prefix'=>'/dashboard','middleware'=>'auth'],function(){
    Route::get('/fillterion',[DashboardController::class,'GetFillterationCategories'])->name('fillteration');
    Route::get('/Ad/{id}',[DashboardController::class,'ShowAdForm'])->name('show-AdCard');
    Route::post('/add-Ad',[AdController::class,'PostAd'])->name('add-product');
    Route::get('/products/{id}',[ProductController::class,'showProducts'])->name('show-products');
    Route::get('/category/{id}',[ProductController::class,'showCategoryProducts'])->name('show-all-products');
    Route::get('/myproducts',[ProductController::class,'showUserProducts'])->name('my-ads');
    Route::get('/Category-form',[CategoryController::class,'showCategoryForm'])->name('show-category-form');
    Route::post('/category',[CategoryController::class,'createCategory'])->name('create-category');
});

require __DIR__.'/auth.php';