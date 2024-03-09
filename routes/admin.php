<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboradController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\AmenityController;


Route::get('/admin/login',[AdminAuthController::class,'login'])->name('admin.login');
Route::get('/admin/forget',[AdminAuthController::class,'forget'])->name('admin.forget');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware'=>['auth','user.type:admin']
],function(){
    Route::get('/dashboard',[DashboradController::class,'index'])->name('dashboard.index');
    Route::get('/logout',[AdminAuthController::class,'logout'])->name('logout');

    //Profile Routes
    Route::get('/profile',[ProfileController::class,'show'])->name('profile.show');
    Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::post('/profile/update',[ProfileController::class,'update'])->name('profile.update');
    Route::put('/profile/change-password',[ProfileController::class,'changPassword'])->name('profile.changPassword');

    // Hero Route
    Route::get('/hero',[HeroController::class,'index'])->name('hero.index');
    Route::put('/hero',[HeroController::class,'update'])->name('hero.update');

    //Category Route
    Route::resource('/category',CategoryController::class)->except(['show']);

    //Location Route
    Route::resource('/location',LocationController::class)->except(['show']);

    //Amenity Route
    Route::resource('/amenity',AmenityController::class);

});
