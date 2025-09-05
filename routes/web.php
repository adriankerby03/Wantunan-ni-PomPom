<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ForgotPasswordController;



Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('password.forgot');
