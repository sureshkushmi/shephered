<?php
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\AdminController; // Ensure the AdminController is included
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\BookingController;

// Public routes

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/{slug}', [App\Http\Controllers\PageController::class, 'show'])->name('page.show');

// Admin routes with authentication
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('packages', PackageController::class);
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile');
    Route::resource('pages', Admin\PageController::class);

});


Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login'); // Redirect to login page after logout
})->name('logout');
Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');

// Auth routes (Login, Register, etc.)
require __DIR__.'/auth.php';
