<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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

Route::get('/landing', [LandingController::class, 'index']);

Route::get('/', [LoginController::class, 'login']);
Route::post('/', [LoginController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/user', [UserController::class, 'index'])->name('users.list');
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user/create', [UserController::class, 'create'])->name('users.create');
Route::get('/delete/user/{id}', [UserController::class, 'delete']);
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

Route::get('/article', [ArticleController::class, 'index'])->name('article.index');;
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/create', [ArticleController::class, 'create'])->name('article.index');;
Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
Route::post('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
Route::get('/delete/article/{id}', [ArticleController::class, 'delete']);

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::get('/delete/category/{id}', [CategoryController::class, 'delete']);
