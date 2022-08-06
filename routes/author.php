<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

Route::prefix('author')->name('author.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login', 'pages.auth.login')->name('login');
        Route::view('/register', 'pages.auth.register')->name('register');
        Route::view('/forgot-pass', 'pages.auth.forgot')->name('forgot-pass');
        Route::get('/password/reset/{token}', [AuthorController::class, 'ResetForm'])->name('pass-reset-form');
    });

    Route::middleware(['auth:web'])->group(function(){
        Route::get('/home', [AuthorController::class, 'index'])->name('home');
        Route::post('/logout', [AuthorController::class, 'logout'])->name('logout');
        Route::view('/profile', 'pages.author.profile')->name('profile');
        Route::post('/change/profile-picture', [AuthorController::class, 'changeProfilePic'])->name('change-profile-pic');
    });
});