<?php
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD

=======
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\AdminController; // Ensure the AdminController is included
use Illuminate\Support\Facades\Auth;
// Public routes
>>>>>>> 7c4be565ec60b8777af7bff2cd3eab274e87361d
Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

<<<<<<< HEAD
// Admin routes with auth middleware
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('packages', \App\Http\Controllers\Admin\PackageController::class);
});

// After Login - Redirect to Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.admin');  // Render your dashboard view
    });
=======
// Admin routes with authentication
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('packages', PackageController::class);
>>>>>>> 7c4be565ec60b8777af7bff2cd3eab274e87361d
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login'); // Redirect to login page after logout
})->name('logout');
Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');

// Auth routes (Login, Register, etc.)
require __DIR__.'/auth.php';
