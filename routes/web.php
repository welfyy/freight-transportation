<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TripController;

// Головна сторінка
Route::get('/', [MainController::class, 'index']);

// Сторінка "Про проєкт"
Route::get('/about', [MainController::class, 'about']);

// Список усіх рейсів (каталог)
Route::get('/trips', [TripController::class, 'index']);

// Сторінка конкретного рейсу за ID
Route::get('/trips/{id}', [TripController::class, 'show']);