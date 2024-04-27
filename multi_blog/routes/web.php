<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllCategoryController;
use App\Http\Controllers\AllPageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentConntroller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PersonalCatehoryController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SocileController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('/blog/single/{id}',[FrontendController::class,'blog_single'])->name('blog.single');

/*=========================================================
                   Frontend Route
=========================================================*/
//__Home page__//
Route::get('/all_caegory',[AllPageController::class,'all_caegory'])->name('all_caegory');
Route::get('/home',[AllPageController::class,'home'])->name('home');

// Route::get('/classic',[AllPageController::class,'classic'])->name('classic');

//__All Category__//
Route::get('/category/item/{id}',[AllCategoryController::class,'category_item'])->name('category.item');
Route::get('/allSubmenu/{id}',[AllCategoryController::class,'allSubmenu'])->name('allSubmenu');

// //__personal info page__//
Route::get('/personal/info/{id}',[PersonalInfoController::class,'personal_info'])->name('personal.info');
Route::get('/all_caegory',[PersonalInfoController::class,'all_caegory'])->name('all_caegory');

// //__subscriber page__//
Route::post('/subscriber/store',[SubscriberController::class,'subscriber_store'])->name('subscribe.store');
Route::get('/blog/post/all',[SubscriberController::class,'loadmore_store'])->name('loadmore.store');

// //__Contact page__//
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('/input/user/store',[ContactController::class,'input_user_store'])->name('input.user.store');

// //__Comment part__//
Route::post('/comment/store',[CommentConntroller::class,'comment_store'])->name('comment.store');
Route::post('/getcommentstatus',[HomeController::class,'getcommentstatus']);
Route::post('/getcommentalertstatus',[HomeController::class,'getcommentalertstatus']);

//__User Dashboard__//
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//__Admin Dashboard__//
Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'admin_dashboard'])->name('admin.dashboard');
});

require __DIR__.'/adminauth.php';

//__Admin Profile__//
Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/admin/logout',[AdminController::class,'admin_logout'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'admin_profile'])->name('admin.profile');
    Route::post('/getcity',[AdminController::class,'getcity']);
    Route::post('/admin/profile/update',[AdminController::class,'admin_profile_update'])->name('admin.profile.update');
});

//__Admin admin socile icon__//
Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/admin/socile/icon',[AdminController::class,'admin_socile_icon'])->name('admin.socile.icon');
    Route::post('/admin/socile/icon/store',[AdminController::class,'admin_socile_icon_store'])->name('admin.socile.icon.store');
    Route::get('/profile/socile/edit/{id}',[AdminController::class,'profile_socile_edit'])->name('profile.socile.edit');
    Route::post('/admin/socile/icon/update',[AdminController::class,'admin_socile_icon_update'])->name('admin.socile.icon.update');
    Route::get('/profile/socile/delete/{id}',[AdminController::class,'profile_socile_delete'])->name('profile.socile.delete');
});

//__Admin admin admin logo__//
Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/instragam',[AdminController::class,'instragam'])->name('instragam');
    Route::post('/store/instragam',[AdminController::class,'store_instragam'])->name('store.instragam');
    Route::get('/instragam_info/delete/{id}',[AdminController::class,'instragam_info_delete'])->name('instragam_info.delete');
    Route::post('/instra/update/{id}',[AdminController::class,'instra_update'])->name('instra.update');
});

//__Admin admin admin logo__//
Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/admin/logo',[AdminController::class,'admin_logo'])->name('admin.logo');
    Route::post('/admin/logo/update/{id}',[AdminController::class,'admin_logo_update'])->name('admin.logo.update');
    Route::post('/frontend/logo/update/{id}',[AdminController::class,'frontend_logo_update'])->name('frontend.logo.update');
    Route::post('/favicon/logo/update/{id}',[AdminController::class,'favicon_log_update'])->name('favicon.logo.update');
});

//__Admin admin user info__//
Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/user/info',[AdminAuthController::class,'user_info'])->name('user.info');
    Route::get('/user/delete/{id}',[AdminAuthController::class,'user_delete'])->name('user.delete');
});

//__Admin Category Part__//
Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/category',[CategoryController::class,'category'])->name('category');
    Route::post('/store/category',[CategoryController::class,'store_category'])->name('store.category');
    Route::post('/category/update/{id}',[CategoryController::class,'category_update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'category_delete'])->name('category.delete');
    Route::post('/category/checked/delete',[CategoryController::class,'category_checked_delete'])->name('category.checked.delete');
});

//__Admin Tag Part__//
Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/tag',[TagController::class,'tag'])->name('tag');
    Route::post('/store/tag',[TagController::class,'store_tag'])->name('store.tag');
    Route::post('/tag/update/{id}',[TagController::class,'tag_update'])->name('tag.update');
    Route::get('/tag/delete/{id}',[TagController::class,'tag_delete'])->name('tag.delete');
});
Route::get('/tag.blog/{id}',[TagController::class,'tag_blog'])->name('tag.blog');


//__Admin admin blog Part__//
Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/admin/blog/list',[AdminBlogController::class,'admin_blog_list'])->name('admin.blog.list');
    Route::post('/getblogstatus',[AdminBlogController::class,'getblogstatus'])->name('getblogstatus');
});

//__Admin subscriber all list Part__//
Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/subscriber/all/list',[AdminBlogController::class,'subscriber_all_list'])->name('subscriber.all.list');
    Route::get('/message/box',[AdminBlogController::class,'message_box'])->name('message.box');
    Route::get('/input/message/delete/{id}',[AdminBlogController::class,'input_message_delete'])->name('input.message.delete');
    Route::get('/subscriber/list/delete/{id}',[AdminBlogController::class,'subscriber_list_delete'])->name('subscriber.list.delete');
});

/**=======================================================
 *                   User Route
 * =====================================================
 */
Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'user_profile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'user_profile_update'])->name('user.profile.update');
    Route::get('/blog', [UserController::class, 'blog'])->name('blog');
});

//__Blog part__//
Route::middleware('auth')->group(function () {
    Route::get('/my/blog', [BlogController::class, 'my_blog'])->name('my.blog');
    Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
    Route::post('/blog/store', [BlogController::class, 'blog_store'])->name('blog.store');
    Route::get('/blog/list', [BlogController::class, 'blog_list'])->name('blog.list');
    Route::get('/blog/view/{id}', [BlogController::class, 'blog_view'])->name('blog.view');
    Route::get('/blog/edit/{id}', [BlogController::class, 'blog_edit'])->name('blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'blog_update'])->name('blog.update');
    Route::get('/blog/soft/delete/{id}', [BlogController::class, 'blog_soft_delete'])->name('blog.soft.delete');
    Route::get('/soft/delete', [BlogController::class, 'soft_delete'])->name('soft.delete');
    Route::get('/blog/replay/{id}', [BlogController::class, 'blog_replay'])->name('blog.replay');
    Route::get('/blog/delete/{id}', [BlogController::class, 'blog_delete'])->name('blog.delete');
    Route::get('/blog/delete/own/{id}', [BlogController::class, 'blog_delete_own'])->name('blog.delete.own');
});

//__Blog part__//
Route::middleware('auth')->group(function () {
    Route::get('/socil/icon', [SocileController::class, 'socil_icon'])->name('socil.icon');
    Route::post('/user_socile_icon_store', [SocileController::class, 'user_socile_icon_store'])->name('user.socile_icon.store');
    Route::get('/user/profile/socile/edit/{id}', [SocileController::class, 'user_profile_socile_edit'])->name('user.profile.socile.edit');
    Route::post('/profile/socile_icon/update/{id}', [SocileController::class, 'profile_socile_icon_update'])->name('profile.socile_icon.update');
    Route::get('/user/profile/socile/delete/{id}', [SocileController::class, 'user_profile_socile_delete'])->name('user.profile.socile.delete');
});

//__menu part__//
Route::middleware('auth')->group(function () {
    Route::get('/menu', [MenuController::class, 'menu'])->name('menu');
    Route::post('/menu/store', [MenuController::class, 'menu_store'])->name('menu.store');
    Route::get('/menu_item/edit/{id}', [MenuController::class, 'menu_item_edit'])->name('menu_item.edit');
    Route::post('/menu/update/{id}', [MenuController::class, 'menu_update'])->name('menu.update');
    Route::get('/menu_item/delete/{id}', [MenuController::class, 'menu_item_delete'])->name('menu_item.delete');
    Route::post('/sub/menu/store', [MenuController::class, 'sub_menu_store'])->name('sub.menu.store');
    Route::get('/sub_menu/edit/{id}', [MenuController::class, 'sub_menu_edit'])->name('sub_menu.edit');
    Route::post('/sub/menu/update/{id}', [MenuController::class, 'sub_menu_update'])->name('sub.menu.update');
    Route::get('/sub_menu/delete/{id}', [MenuController::class, 'sub_menu_delete'])->name('sub_menu.delete');
});

//__Add A Role__//
Route::middleware('auth')->group(function () {
    Route::get('/role/manag', [RoleController::class, 'role_manag'])->name('role.manag');
    Route::post('/permition/store', [RoleController::class, 'permition_store'])->name('permition.store');
    Route::post('/role/store', [RoleController::class, 'role_store'])->name('role.store');
    Route::get('/role/delete/{id}', [RoleController::class, 'role_delete'])->name('role.delete');
    Route::get('/role/edit/{id}', [RoleController::class, 'role_edit'])->name('role.edit');
    Route::post('/role/update/{id}', [RoleController::class, 'role_update'])->name('role.update');
    Route::post('/assin/role', [RoleController::class, 'assin_role'])->name('assin.role');
    Route::get('/role/remove/{id}', [RoleController::class, 'role_remove'])->name('role.remove');
});








