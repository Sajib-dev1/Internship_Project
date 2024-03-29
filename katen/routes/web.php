<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//__Frontend Part__//
Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('/blog/sngle/{id}',[FrontendController::class,'blog_sngle'])->name('blog.sngle');
Route::post('/subscriber/store',[FrontendController::class,'subscriber_store'])->name('subscriber.store');

//__Dashboard part__//
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//__Admin Dashboard part__//
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';

//__Category__//
Route::get('/category',[CategoryController::class,'category'])->middleware(['auth:admin', 'verified'])->name('category');
Route::post('/store/category',[CategoryController::class,'store_category'])->middleware(['auth:admin', 'verified'])->name('store.category');

//__tag__//
Route::get('/tag',[TagController::class,'tag'])->middleware(['auth:admin', 'verified'])->name('tag');
Route::post('/store/tag',[TagController::class,'store_tag'])->middleware(['auth:admin', 'verified'])->name('store.tag');

//__Blog__//
Route::get('/blog',[BlogController::class,'blog'])->middleware(['auth:admin', 'verified'])->name('blog');


//__User part __//
Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'uses'])->name('user');    
    Route::get('/user/profile', [UserController::class, 'user_profile'])->name('user.profile');    
    Route::post('/user/update', [UserController::class, 'user_update'])->name('user.profile.update');
    Route::post('/user/password/update', [UserController::class, 'user_password_update'])->name('user.password.update');
    Route::post('/getcity',[UserController::class,'getcity']);    
    Route::post('/socile_icon/store', [UserController::class, 'socile_icon_store'])->name('socile_icon.store');
    Route::get('/user/view/{id}', [UserController::class, 'user_view'])->name('user.view');    
    Route::get('/user/edit/{id}', [UserController::class, 'user_edit'])->name('user.edit');    
    Route::post('/user/edit/{id}', [UserController::class, 'user_profile_update_info'])->name('user.profile.update.info');    
    Route::get('/user/delete/{id}', [UserController::class, 'user_delete'])->name('user.delete');    
    Route::get('/profile/socile/edit/{id}', [UserController::class, 'profile_socile_edit'])->name('profile.socile.edit');    
    Route::post('/profile/socile/edit/{id}', [UserController::class, 'profile_socile_icon_update'])->name('profile.socile_icon.update');    
    Route::get('/profile/socile/delete/{id}', [UserController::class, 'profile_socile_delete'])->name('profile.socile.delete');    
});

//__Blog__//
Route::middleware('auth')->group(function () {
Route::get('/blog',[BlogController::class,'blog'])->name('blog');  
Route::post('/blog/store',[BlogController::class,'blog_store'])->name('blog.store');  
Route::get('/blog/list',[BlogController::class,'blog_list'])->name('blog.list');    
});




