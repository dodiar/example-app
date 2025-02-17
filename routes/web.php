<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/create', [NewsController::class, 'create']);
Route::post('/news', [NewsController::class, 'store']);
Route::get('/news/{id}', [NewsController::class, 'show']);

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