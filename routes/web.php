<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Post Routes
Route::get('/article/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::get('/post/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/post/status/{id}', [App\Http\Controllers\PostController::class, 'toggleStatus'])->name('post.status');

// Comments Routes
Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
Route::get('/comment/status/{id}', [App\Http\Controllers\CommentController::class, 'toggleStatus'])->name('comment.status');
Route::post('/reply/store', [App\Http\Controllers\CommentController::class, 'storeReply'])->name('reply.store');

// Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
