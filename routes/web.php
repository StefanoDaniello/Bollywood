<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HallController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\TimeSlotController;
use App\Http\Controllers\Admin\HallMovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
    // il middleware serve per controllare che l'utente sia loggato
    // e che sia verificato quindi e nel mezzo tra la chiamata e la risposta
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('halls', HallController::class);
    Route::resource('movies', MovieController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('time_slots', TimeSlotController::class);
    Route::resource('halls_movies', HallMovieController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::fallback(function () {
    return redirect()->route('admin.dashboard');
});