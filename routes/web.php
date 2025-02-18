<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/news');

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/create', [NewsController::class, 'create'])->middleware('auth');
Route::post('/news', [NewsController::class, 'store'])->middleware('auth');
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->middleware('auth');
Route::put('/news/{id}', [NewsController::class, 'update'])->middleware('auth');
Route::delete('/news/{id}', [NewsController::class, 'destroy'])->middleware('auth');

Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


// Route::get('/blog', [BlogController::class, 'index']);

Route::get('/about', [BlogController::class, 'about']);

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('/blog/{slug}', function ($slug) {
    return 'Slug '.$slug;
});

Route::redirect('/home', '/welcome');