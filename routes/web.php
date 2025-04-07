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

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('packages', \App\Http\Controllers\Admin\PackageController::class);
});




