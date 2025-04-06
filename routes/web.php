<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

// Admin routes with auth middleware
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('packages', \App\Http\Controllers\Admin\PackageController::class);
});

// Add this line to include the auth routes
require __DIR__.'/auth.php';
