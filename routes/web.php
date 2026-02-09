<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BEIController;
use App\Http\Controllers\CDCController;
use App\Http\Controllers\Admin\BeiAdminController;
use App\Http\Controllers\Admin\CdcAdminController;
use App\Http\Controllers\Admin\CdcJobController;
use App\Http\Controllers\Admin\CdcEventController;
use App\Http\Controllers\Admin\CdcNewsController;
use App\Http\Controllers\Auth\AdminLoginController;

// Public routes
Route::get('/', [CDCController::class, 'index'])->name('home');
Route::post('/cdc/register', [CDCController::class, 'register'])->name('cdc.register');

Route::get('/bei', [BEIController::class, 'index'])->name('bei.home');
Route::post('/bei/register', [BEIController::class, 'register'])->name('bei.register');

// Auth routes
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminLoginController::class, 'login'])->name('login.post');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

// Protected admin routes
Route::middleware('auth')->prefix('admin-page')->name('admin.')->group(function () {
    
    // Root admin-page redirect
    Route::get('/', function () {
        $user = Auth::user();
        
        if ($user->isCdcAdmin()) {
            return redirect()->route('admin.cdc.dashboard');
        }
        
        if ($user->isBeiAdmin()) {
            return redirect()->route('admin.bei.dashboard');
        }
        
        return redirect()->route('admin.cdc.dashboard');
    })->name('dashboard');
    
    // CDC Admin Routes
    Route::prefix('cdc')->name('cdc.')->group(function () {
        Route::get('/', [CdcAdminController::class, 'dashboard'])->name('dashboard');
        
        // Job Listings
        Route::resource('jobs', CdcJobController::class);
        Route::post('jobs/{job}/toggle-active', [CdcJobController::class, 'toggleActive'])->name('jobs.toggle-active');
        
        // Events
        Route::resource('events', CdcEventController::class);
        Route::get('events/{event}/registrations', [CdcEventController::class, 'registrations'])->name('events.registrations');
        Route::post('events/registrations/{registration}/approve', [CdcEventController::class, 'approveRegistration'])->name('events.registrations.approve');
        Route::post('events/registrations/{registration}/reject', [CdcEventController::class, 'rejectRegistration'])->name('events.registrations.reject');
        Route::get('events/{event}/export', [CdcEventController::class, 'exportRegistrations'])->name('events.export');
        
        // News
        Route::resource('news', CdcNewsController::class);
        Route::post('news/{news}/publish', [CdcNewsController::class, 'publish'])->name('news.publish');
    });
    
    // BEI Admin Routes
    Route::prefix('bei')->name('bei.')->group(function () {
        Route::get('/', [BeiAdminController::class, 'dashboard'])->name('dashboard');
        
        // Events
        Route::resource('events', \App\Http\Controllers\Admin\BeiEventController::class);
        Route::get('events/{event}/registrations', [\App\Http\Controllers\Admin\BeiEventController::class, 'registrations'])->name('events.registrations');
        
        // Education Materials
        Route::resource('educations', \App\Http\Controllers\Admin\BeiEducationController::class);
        
        // Galleries
        Route::resource('galleries', \App\Http\Controllers\Admin\BeiGalleryController::class);
        
        // Legacy routes for backward compatibility
        Route::post('/events', [BeiAdminController::class, 'storeEvent'])->name('events.store.legacy');
        Route::post('/events/{event}/delete', [BeiAdminController::class, 'deleteEvent'])->name('events.delete');
    });
});