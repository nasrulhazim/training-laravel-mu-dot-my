<?php

use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\HelloWorldMethodController;
use Illuminate\Support\Facades\Route;

// define route by closure
Route::get('/hello-world', function() {
    return 'hello-world';
});

// define by invokable controller
Route::get('/hello-world-invokable', HelloWorldController::class);

// define by controller's method
Route::get('/hello-world-method', [HelloWorldMethodController::class, 'show']);

// define by resource controller











Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
