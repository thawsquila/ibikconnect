<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BEIController;
use App\Http\Controllers\Admin\BeiAdminController;

Route::get('/', function () {
    return view('cdc.home');
});

Route::get('/bei', [BEIController::class, 'index']);
Route::post('/bei/register', [BEIController::class, 'register']);

Route::get('/admin/bei', [BeiAdminController::class, 'dashboard']);
Route::post('/admin/bei/events', [BeiAdminController::class, 'storeEvent']);
Route::post('/admin/bei/events/{event}/delete', [BeiAdminController::class, 'deleteEvent']);