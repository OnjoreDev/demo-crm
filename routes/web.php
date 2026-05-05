<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //customer routes
    Route::resource('customers', CustomerController::class);
    //interactions
    Route::post('/customers/{customer}/interactions', [InteractionController::class, 'store'])
        ->name('interactions.store');
    Route::delete('/interaction/{interaction}', [InteractionController::class, 'destroy'])->name('interactions.destroy');
});

require __DIR__ . '/auth.php';
