<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    $name = 'Dodi';
    return view('welcome', ['name' => $name]);
})->name('/home');

Route::get('/blog', [BlogController::class, 'index']);

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