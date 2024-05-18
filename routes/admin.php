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
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PaymentSettingController;
use App\Http\Controllers\Admin\ReviewCatController;
use App\Http\Controllers\Admin\ReviewController;


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

    //Pages
    Route::get('/about',[\App\Http\Controllers\Admin\PageController::class , 'about'])->name('about.show');
    Route::put('/about',[\App\Http\Controllers\Admin\PageController::class , 'about_update'])->name('about.update');
    Route::get('/contact' , [\App\Http\Controllers\Admin\PageController::class , 'contact'])->name('contact.show');
    Route::put('/contact' , [\App\Http\Controllers\Admin\PageController::class , 'contact_update'])->name('contact.update');

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

    //ajax
    Route::post('/ajax/get-child-categories', [ListingController::class,'getChildCategories'])->name('Child_Categories');
    Route::post('/ajax/get-child-locations', [ListingController::class,'getChildLocations'])->name('Child_Locations');

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

    //Role
    Route::resource('/role' , \App\Http\Controllers\Admin\RoleController::class)->except(['show']);

    //User
    Route::resource('/user',\App\Http\Controllers\Admin\UserController::class);

    //Packages
    Route::resource('/package',PackageController::class)->except(['show']);

    //Setting
    Route::get('/setting',[SettingController::class,'index'])->name('setting.index');
    Route::post('/general-setting',[SettingController::class,'updateGeneral'])->name('general-setting.update');
    Route::post('/pusher-setting',[SettingController::class,'updatePusher'])->name('pusher-setting.update');

    //Menu
    Route::get('/menu', [\App\Http\Controllers\Admin\MenuController::class , 'index'])->name('menu.index');

    //Payment Setting
    Route::get('/payment-setting',[PaymentSettingController::class,'index'])->name('payment-setting.index');
    Route::post('/paypal-setting',[PaymentSettingController::class,'paypalSetting'])->name('paypal-setting.update');
    Route::post('/aqayepardakht-setting',[PaymentSettingController::class,'aqayepardakhtSetting'])->name('aqayepardakht-setting.update');

    //Review
    Route::get('/review',[ReviewController::class, 'index'])->name('review.index');
    Route::delete('/review/{review}',[ReviewController::class, 'destroy'])->name('review.destroy');
    Route::get('/review/activate/{review}',[ReviewController::class , 'activate'])->name('review.activate');
    Route::get('/review/disable/{review}',[ReviewController::class , 'disable'])->name('review.disable');
    Route::resource('/review-cat',ReviewCatController::class)->except(['show']);

    //report
    Route::get('/report',[ReportController::class , 'index'])->name('report.index');
    Route::delete('/report/{report}',[ReportController::class , 'destroy'])->name('report.destroy');

    //Testimonial
    Route::resource('/testimonial',\App\Http\Controllers\Admin\TestimonialController::class)->except(['show']);

    //Blog Category
    Route::resource('/blog-category', \App\Http\Controllers\Admin\BlogCategoryController::class)->except(['show']);

    //Post
    Route::resource('/post', \App\Http\Controllers\Admin\PostController::class);

    //comment
    Route::get('/comments',[\App\Http\Controllers\Admin\CommentController::class , 'index'])->name('comment.index');
    Route::delete('/comment/{comment}' , [\App\Http\Controllers\Admin\CommentController::class , 'destroy'])->name('comment.destroy');
    Route::get('/comment/activate/{comment}',[\App\Http\Controllers\Admin\CommentController::class , 'activate'])->name('comment.activate');
    Route::get('/comment/disable/{comment}',[\App\Http\Controllers\Admin\CommentController::class , 'disable'])->name('comment.disable');

    //chat
    Route::get('/chat',[\App\Http\Controllers\Admin\ChatController::class , 'index'])->name('chat.index');
    Route::post('/chat',[\App\Http\Controllers\Admin\ChatController::class , 'show'])->name('chat.showMessage');
    Route::post('/chat/add',[\App\Http\Controllers\Admin\ChatController::class ,'addMessage'])->name('chat.addMessage');

});
