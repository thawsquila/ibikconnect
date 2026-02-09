<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BEIController;
use App\Http\Controllers\CDCController;
use App\Http\Controllers\Admin\BeiAdminController;
use App\Http\Controllers\Auth\AdminLoginController;

Route::get('/', [CDCController::class, 'index']);
Route::post('/cdc/register', [CDCController::class, 'register']);

Route::get('/bei', [BEIController::class, 'index']);
Route::post('/bei/register', [BEIController::class, 'register']);

// Auth routes
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminLoginController::class, 'login']);
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

// Protected admin routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/bei', [BeiAdminController::class, 'dashboard']);
    Route::post('/admin/bei/events', [BeiAdminController::class, 'storeEvent']);
});
Route::post('/admin/bei/events/{event}/delete', [BeiAdminController::class, 'deleteEvent']);