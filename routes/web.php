<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Movie routes
Route::middleware('auth')->group(function () {
    Route::get('/movie', [MovieController::class, 'index'])->name('movies.index');
    Route::post('/movie', [MovieController::class, 'store'])->name('movies.store');
    Route::put('/movie/movies/{id}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movie/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');   
});

//Product Route
Route::resource('/product',ProductController::class);


require __DIR__.'/auth.php';
