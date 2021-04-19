<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentController;

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




Route::get('/', [BlogPostController::class, 'index'])->name('posts.index');

Route::get('/posts', [BlogPostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [BlogPostController::class, 'show'])->name('posts.show');
Route::post('/posts', [BlogPostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{id}', [BlogPostController::class, 'destroy'])->name('posts.destroy');
Route::put('/posts/{id}', [BlogPostController::class, 'update'])->name('posts.update');
Route::post('/posts/{id}/comments', [BlogPostController::class, 'storePostComment'])->name('posts.comments.store');

Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comments.show');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
