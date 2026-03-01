<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/help-requests', [PublicController::class, 'helpRequests'])->name('public.requests');
Route::get('/ledger', [PublicController::class, 'ledger'])->name('public.ledger');

Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/team', function () { return view('team'); })->name('team');
Route::get('/policies', function () { return view('policies'); })->name('policies');

use App\Http\Controllers\HelpRequestController;
use App\Http\Controllers\DonationController;

use App\Http\Controllers\AdminController;

Route::get('/donate', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donate', [DonationController::class, 'store'])->name('donations.store');

Route::middleware('auth')->group(function () {
    Route::get('/request-help', [HelpRequestController::class, 'create'])->name('help-requests.create');
    Route::post('/request-help', [HelpRequestController::class, 'store'])->name('help-requests.store');

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/requests/{id}/status', [AdminController::class, 'updateRequestStatus'])->name('admin.requests.status');
        Route::post('/distributions', [AdminController::class, 'storeDistribution'])->name('admin.distributions.store');
    });
});

use Illuminate\Support\Facades\Artisan;

Route::get('/run-migrations', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return '<pre>' . Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return '<pre>' . $e->getMessage() . '</pre>';
    }
});
