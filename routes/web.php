<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\HireController;

// Home → redirect to freelancers listing
Route::get('/', function () {
    return redirect()->route('freelancers.index');
});

// 🔒 Protected Routes — must be logged in
Route::middleware(['auth'])->group(function () {

    // Freelancer Routes
    Route::get('/freelancers', [FreelancerController::class, 'index'])->name('freelancers.index');
    Route::get('/freelancers/{id}', [FreelancerController::class, 'show'])->name('freelancers.show');

    // Hire Routes
    Route::get('/freelancers/{id}/hire', [HireController::class, 'form'])->name('hire.form');
    Route::post('/freelancers/{id}/hire', [HireController::class, 'submit'])->name('hire.submit');
    Route::get('/hire/{id}/confirm', [HireController::class, 'confirm'])->name('hire.confirm');
    Route::post('/hire/{id}/confirm', [HireController::class, 'markPaid'])->name('hire.markPaid');

});

// Breeze auth routes (login, register, logout)
require __DIR__.'/auth.php';