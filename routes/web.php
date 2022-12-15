<?php

use App\Http\Controllers\AccessUrlController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\History;
use App\Http\Livewire\Shortner;
use Illuminate\Support\Facades\Route;


Route::get('/', Shortner::class);
Route::get('/{code}', AccessUrlController::class)->name('accessUrl');

Route::prefix('user/')->group(function () {
    Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/history/{url}', History::class)->middleware(['auth', 'verified'])->name('history');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
