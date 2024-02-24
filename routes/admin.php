<?php
use App\Http\Controllers\Admin\DashboradController;
use App\Http\Controllers\Admin\AdminAuthController;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware'=>['auth','user.type:admin']
],function(){
    Route::get('/login',[AdminAuthController::class,'login'])->name('login');
    Route::get('/dashboard',[DashboradController::class,'index'])->name('dashboard.index');
});
