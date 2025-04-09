<?php
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\AdminController; // Ensure the AdminController is included
use Illuminate\Support\Facades\Auth;
// Public routes

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});


// Admin routes with authentication
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('packages', PackageController::class);

});

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login'); // Redirect to login page after logout
})->name('logout');
Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');

// Auth routes (Login, Register, etc.)
require __DIR__.'/auth.php';
