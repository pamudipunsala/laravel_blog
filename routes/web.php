<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use  App\Http\Controllers\Admin\PostController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {

    Route::get('/dashboard',[DashboardController::class, 'index']);

    Route::get('category', [CategoryController::class, 'index']);

    Route::get('add-category', [CategoryController::class, 'create']);

    Route::post('add-category', [CategoryController::class, 'store']);

    Route::get('edit-category/{category_id}', [CategoryController::class, 'edit']);

    Route::put('update-category/{category_id}', [CategoryController::class, 'update']);

    Route::get('delete-category/{category_id}', [CategoryController::class, 'destroy']);

    Route::get('posts', [PostController::class, 'index']);

    Route::get('add-post', [PostController::class, 'create']);

    Route::post('add-post', [PostController::class, 'store']);

    Route::get('post/{post_id}', [PostController::class, 'edit']);
   
});