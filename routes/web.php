<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
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
    return view('client_layout');
});

Route::get('/product', function () {
    return view('niit.product');
})->name('niit.product');

Route::get('/home', function () {
    return view('niit.homepage');
})->name('niit.homepage');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::delete('/users' . '/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::patch('/users' . '/{id}', [UserController::class, 'update'])->name('users.update');
Route::put('/users' . '/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::delete('/posts' . '/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::patch('/posts' . '/{id}', [PostController::class, 'update'])->name('posts.update');
Route::put('/posts' . '/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::delete('/categories' . '/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::patch('/categories' . '/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::put('/categories' . '/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');