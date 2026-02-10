<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureAdmin;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ActivityLogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin routes protected by EnsureAdmin middleware
Route::prefix('admin')->middleware([EnsureAdmin::class])->name('admin.')->group(function(){
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('devices', DeviceController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('loans', LoanController::class);
    Route::get('logs', [ActivityLogController::class,'index'])->name('activity_logs.index');
});

// Public/Authenticated loan routes (for peminjam and petugas)
Route::middleware(['auth'])->group(function(){
    Route::get('/devices', [DeviceController::class,'index'])->name('devices.list');
    Route::get('/loans', [LoanController::class,'index'])->name('loans.index');
    Route::get('/loans/create', [LoanController::class,'create'])->name('loans.create');
    Route::post('/loans', [LoanController::class,'store'])->name('loans.store');
    Route::post('/loans/{loan}/approve', [LoanController::class,'approve'])->name('loans.approve');
    Route::post('/loans/{loan}/reject', [LoanController::class,'reject'])->name('loans.reject');
    Route::post('/loans/{loan}/return', [LoanController::class,'markReturned'])->name('loans.return');
});
