<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\Authenticate;


// Auth routes
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('leads', LeadController::class);
    Route::resource('products', ProductController::class);
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('/projects/{id}/approve', [ProjectController::class, 'approve'])->name('projects.approve');
    Route::get('/customers', [ProjectController::class, 'approvedProjectsForCustomer'])->name('customers.index');
});


