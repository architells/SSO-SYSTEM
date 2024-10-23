<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SSO\ssoDashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::get('/', [MainPageController::class, 'index'])->name('home');
    
Route::get('/sso-login-page', [MainPageController::class, 'ShowSsoLogin'])->name('auth.sso-login-page');

Route::get('/sso-register-page', [MainPageController::class, 'ShowSsoRegister'])->name('auth.sso-register-page');
 
// SSO route 
Route::get('/SSO/dashboard', [SsoDashboard::class, 'dashboard'])->name('SSO.dashboard');
Route::get('/SSO/user-profile', [SsoDashboard::class, 'showProfile'])->name('SSO.profile.user-profile');
Route::get('/SSO/add-user', [SsoDashboard::class, 'showAdd'])->name('SSO.add-user');
Route::get('/SSO/settings', [SsoDashboard::class, 'showSettings'])->name('SSO.settings');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
