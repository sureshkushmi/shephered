<?php

use App\Http\Controllers\PackageController as FrontPackageController;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('pages.home');
});
Route::get('/tour-packages', [FrontPackageController::class, 'index'])->name('tour-packages.index');




// Auth routes
Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

require __DIR__.'/auth.php';

// Admin routes with authentication
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('packages', PackageController::class);
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile');
    Route::resource('pages', PageController::class);
    Route::resource('services', ServiceController::class);
    Route:: resource('slider',SliderController::class);

});
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
// Catch-all dynamic route (should be at the end)
Route::get('/{slug}', [App\Http\Controllers\PageController::class, 'show'])->name('page.show');
