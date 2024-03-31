<?php


use App\Http\Controllers\Frontend\ListingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\DashboradController;
use App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;
use App\Http\Controllers\Frontend\AgentListingGalleryController;
use App\Http\Controllers\Frontend\AgentScheduleConrtoller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/listing', [FrontendController::class, 'listing'])->name('listing');
Route::get('/listing/ajax-modal/{listing}', [FrontendController::class, 'listingAjaxModal'])->name('listing.ajax-modal');
Route::get('/list/{listing:slug}',[FrontendController::class, 'showListing'])->name('listing.show');
Route::get('/packages',[FrontendController::class, 'packages'])->name('packages');
Route::get('/checkout/{id}',[FrontendController::class, 'checkout'])->name('checkout.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'auth','prefix' => '/user','as'=>'user.'],function (){
    Route::get('/dashboard', [DashboradController::class, 'index'])->name('dashboard');
    Route::get('/profile', [FrontendProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [FrontendProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile-password', [FrontendProfileController::class, 'updatePassword'])->name('profile.password');

    //Listing User Route
    Route::resource('/listing', ListingController::class)->except('show');
    Route::resource('/gallery',AgentListingGalleryController::class)->except(['index','update','edit','show']);
    //Schedule Route
    Route::get('/schedule/{listing}',[AgentScheduleConrtoller::class,'create'])->name('schedule.create');
    Route::post('/schedule/{listing}',[AgentScheduleConrtoller::class,'store'])->name('schedule.store');
    Route::put('/schedule/{listing}',[AgentScheduleConrtoller::class,'update'])->name('schedule.update');
});

require __DIR__.'/auth.php';
