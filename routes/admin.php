<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboradController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PendingListingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\ImageGalleryController;
use App\Http\Controllers\Admin\ScheduleController;


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
    Route::resource('/amenity',AmenityController::class)->except(['show']);

    //Listing Route
    Route::get('/listing/pending',[PendingListingController::class,'index'])->name('listing.pending.index');
    Route::post('/listing/pending',[PendingListingController::class,'update'])->name('listing.pending.update');
    Route::resource('/listing',ListingController::class)->except(['show']);

    //Image Gallery Routes
    Route::get('/image-gallery/{listing}',[ImageGalleryController::class,'create'])->name('image-gallery.create');
    Route::post('/image-gallery',[ImageGalleryController::class,'store'])->name('image-gallery.store');
    Route::get('/image-gallery/delete/{imageGallery}',[ImageGalleryController::class,'destroy'])->name('image-gallery.destroy');
    Route::put('/image-gallery',[ImageGalleryController::class,'store'])->name('image-gallery.store');

    //Listing Schedule Routes
    Route::get('/schedule',[ScheduleController::class,'index'])->name('schedule.index');
    Route::get('/schedule/{listing}',[ScheduleController::class,'create'])->name('schedule.create');
    Route::post('/schedule/{listing}',[ScheduleController::class,'store'])->name('schedule.store');
    Route::put('/schedule/{listing}',[ScheduleController::class,'update'])->name('schedule.update');
    Route::get('/schedule/delete/{schedule}',[ScheduleController::class,'destroy'])->name('schedule.destroy');

    //Packages
    Route::resource('/package',PackageController::class);

});
