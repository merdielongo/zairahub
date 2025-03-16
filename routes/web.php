<?php

use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function () {

    Route::resource('organizations', OrganizationController::class);
    Route::get('/register/organization', [OrganizationController::class, 'createForUser'])->name('register.organization');
});
