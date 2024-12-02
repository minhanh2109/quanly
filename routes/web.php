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

Route::get('/dashboard', function () {
    return view('dashboard');
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

//Admin danh mục
Route::get('view_category',[AdminController::class,'view_category'])
    ->middleware(['auth','admin']);
//Thêm danh mục
Route::post('add_category',[AdminController::class,'add_category'])
    ->middleware(['auth','admin']);
//Xóa danh mục
Route::get('delete_category/{id}',[AdminController::class,'delete_category'])
    ->middleware(['auth','admin']);

