<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/help-requests', [PublicController::class, 'helpRequests'])->name('public.requests');
Route::get('/ledger', [PublicController::class, 'ledger'])->name('public.ledger');

Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/team', function () { return view('team'); })->name('team');
Route::get('/policies', function () { return view('policies'); })->name('policies');

use App\Http\Controllers\HelpRequestController;
use App\Http\Controllers\DonationController;

Route::get('/request-help', [HelpRequestController::class, 'create'])->name('help-requests.create');
Route::post('/request-help', [HelpRequestController::class, 'store'])->name('help-requests.store');

Route::get('/donate', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donate', [DonationController::class, 'store'])->name('donations.store');

use App\Http\Controllers\AdminController;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/requests/{id}/status', [AdminController::class, 'updateRequestStatus'])->name('admin.requests.status');
    Route::post('/distributions', [AdminController::class, 'storeDistribution'])->name('admin.distributions.store');
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
