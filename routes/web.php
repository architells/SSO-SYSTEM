<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SSO\ssoDashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SSC\MainPageController;


Route::get('/', [MainPageController::class, 'index'])->name('home');

Route::get('/ssc-login', [MainPageController::class, 'showLoginPage'])->name('auth.sso-login-page');

Route::get('/ssc-register-page', [MainPageController::class, 'ShowSscRegister'])->name('auth.ssc-register-page');

Route::get('/sso-login-page', [MainPageController::class, 'ShowSsoLogin'])->name('auth.sso-login-page');

Route::get('/sso-register-page', [MainPageController::class, 'ShowSsoRegister'])->name('auth.sso-register-page');
   
Route::middleware(['auth', \App\Http\Middleware\CheckRole::class . ':SSO'])->group(function () {
    Route::get('/SSO/dashboard', [SsoDashboard::class, 'dashboard'])->name('SSO.dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
