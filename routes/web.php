<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TripController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Головна сторінка (використовує welcome.blade.php через MainController)
Route::get('/', [MainController::class, 'index'])->name('home');

// Сторінка "Про проєкт"
Route::get('/about', [MainController::class, 'about'])->name('about');

// Список усіх рейсів (Каталог)
Route::get('/trips', [TripController::class, 'index'])->name('trips.index');

// Детальна сторінка конкретного рейсу
Route::get('/trips/{id}', [TripController::class, 'show'])->name('trips.show');