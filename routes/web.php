<?php

use Illuminate\Support\Facades\Route;

// Redirigir la raíz directamente a la ruta de login
Route::redirect('/', '/login')->name('login');

//Route::redirect('/', '/dashboard');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
