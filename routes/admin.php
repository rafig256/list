<?php
use App\Http\Controllers\Admin\DashboradController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ProfileController;


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
});
