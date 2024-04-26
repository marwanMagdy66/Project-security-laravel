<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\auth\AdminLoginController;
use App\Http\Controllers\admin\auth\AdminRegisterController;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admin/dashboard/')->name('admin.dashboard.')->group(function () {
    Route::controller(AdminLoginController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'checkLogin')->name('check');
        Route::post('logout', 'logout')->name('logout');

    });

    Route::controller(AdminRegisterController::class)->group(function () {

        Route::get('register', 'register')->name('register');
        Route::post('register', 'store')->name('store');
    });

});







Route::middleware('auth:admin')->group(function(){


Route::get('admin/posts/create', [AdminHomeController::class, 'create'])->name('admin.posts.create');

Route::get('admin/posts/{post}', [AdminHomeController::class, 'show'])->name('admin.posts.show');

Route::post('admin/posts', [AdminHomeController::class, 'store'])->name('admin.posts.store');

Route::get('admin/posts/{post}/edit', [AdminHomeController::class, 'edit'])->name('admin.posts.edit');

Route::put('admin/posts/{post}', [AdminHomeController::class, 'update'])->name('admin.posts.update');

Route::delete('admin/posts/{post}', [AdminHomeController::class, 'destroy'])->name('admin.posts.destroy');

Route::get('admin/dashboard/home', [AdminHomeController::class, 'home'])->name('admin.dashboard.home');

Route::get('admin/dashboard/edit/users', [AdminHomeController::class, 'edit_users'])->name('admin.edit.users');

Route::delete('/posts/{post}', [AdminHomeController::class, 'delete_users'])->name('admin.destroy');

});

Auth::routes(['verify'=>true]);
