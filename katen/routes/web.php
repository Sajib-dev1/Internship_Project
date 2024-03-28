<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//__Admin Login__//
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
});

//__Blog__//
Route::middleware('auth')->group(function () {
Route::get('/blog',[BlogController::class,'blog'])->name('blog');  
});




