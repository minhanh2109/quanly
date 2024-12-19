<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//Trang chủ
Route::get('/',[HomeController::class,'home']);
Route::get('/dashboard',[HomeController::class,'login_home'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

//Thông tin cá nhân
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Admin
Route::get('admin/dashboard',[HomeController::class,'index'])
    ->middleware(['auth','admin']);

//Danh mục sản phẩm
Route::get('view_category',[AdminController::class,'view_category'])
    ->middleware(['auth','admin']);

//Thêm danh mục
Route::post('add_category',[AdminController::class,'add_category'])
    ->middleware(['auth','admin']);

//Sửa danh mục
Route::get('edit_category/{id}',[AdminController::class,'edit_category'])
    ->middleware(['auth','admin']);

Route::post('update_category/{id}',[AdminController::class,'update_category'])
    ->middleware(['auth','admin']);

//Xóa danh mục
Route::get('delete_category/{id}',[AdminController::class,'delete_category'])
    ->middleware(['auth','admin']);

//Danh sách sản phẩm
Route::get('view_product',[AdminController::class,'view_product'])
    ->name('view_product')
    ->middleware(['auth','admin']);

//Thêm sản phẩm
Route::get('add_product',[AdminController::class,'add_product'])
    ->middleware(['auth','admin']);
    
Route::post('upload_product',[AdminController::class,'upload_product'])
    ->middleware(['auth','admin']);
//Xóa sản phẩm
Route::get('delete_product/{id}',[AdminController::class,'delete_product'])
    ->middleware(['auth','admin']);
//Cập nhật sản phẩm
Route::get('edit_product/{id}',[AdminController::class,'edit_product'])
    ->middleware(['auth','admin']);

Route::post('update_product/{id}',[AdminController::class,'update_product'])
    ->middleware(['auth','admin']);
//Tìm kiếm sản phẩm
Route::get('product_search',[AdminController::class,'product_search'])
    ->middleware(['auth','admin']);