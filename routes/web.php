<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;

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


// Route::get('/blogposts', function () {})->name('blogposts/index');

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/1', function () {
    return "<h1>Hello</h1>";
});

// /{1} ;; /{jonas}
// Route::get('/{text}', function($x) {
//     return "Sveikas, "  . $x;
// });

// Route::get('/posts', 'App\Http\Controllers\BlogPostController@index');
// Route::get('/posts/{id}', 'App\Http\Controllers\BlogPostController@show');

Route::get('/posts', [BlogPostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [BlogPostController::class, 'show'])->name('posts.show');
Route::post('/posts', [BlogPostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{id}', [BlogPostController::class, 'destroy'])->name('posts.destroy');
Route::put('/posts/{id}', [BlogPostController::class, 'update'])->name('posts.update');
Route::post('/posts/{id}/comments', [BlogPostController::class, 'storePostComment'])->name('posts.comments.store');



// Route::get('/db', function () {
//     var_dump(DB::connection()->getPdo());
//  })->name('testdb');

// use App\Models\BlogPost;
// Route::get('/bp', function () {
//     $bp = new BlogPost();
//     $bp->title = "Bp 1";
//     $bp->text = "Bp text 1";
//     $bp->save();
//     return BlogPost::where('title', 'Bp 1')->first();
//     // return BlogPost::all();
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
