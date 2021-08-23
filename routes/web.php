<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blog', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('blog.index');

Auth::routes();
// Route::view('/{path?}', 'web');
Route::get('/blog/{$id}', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('posts.show');

Route::get('/blog/{$id}/edit', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('posts.edit');



Route::resources([
    'blog' => 'App\Http\Controllers\Admin\PostController',
]);
