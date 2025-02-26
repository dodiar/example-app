<?php

use App\Models\User;
use App\Mail\MailTest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Jobs\SendEmailVerification;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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

Route::get('/test_mail', function () {
    $name = 'Dodi';
    Mail::to('test@example.com')->send(new MailTest($name));
    return 'Ok';
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::ResetLinkSent
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PasswordReset
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth','verified']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    // SendEmailVerification::dispatch($request->user());
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/writer', function() {
    return 'writer page';
})->middleware('auth', 'role:writer');

Route::get('/editor', function() {
    return 'editor page';
})->middleware('auth', 'role:editor');

Route::get('/giveRole/{id}', function($id) {
    $user = User::find($id);

    $user->assignRole('editor');

    return 'ok';
});

Route::get('/chang-lang/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'id'])) {
        abort(400);
    }
 
    App::setLocale($locale);

    session()->put('locale', $locale);
    
    $locale = App::currentLocale();

    return $locale;
});

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

// Route::redirect('/home', '/welcome');