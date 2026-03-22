<?php

use App\Http\Controllers\Api\TripController;
use Illuminate\Support\Facades\Route;

Route::get('/trips', [TripController::class, 'index']);          // Список усіх рейсів
Route::get('/trips/{id}', [TripController::class, 'show']);      // Один рейс
Route::post('/trips/store', [TripController::class, 'store']);  // Додавання
Route::put('/trips/{id}', [TripController::class, 'update']);    // Редагування
Route::delete('/trips/{id}', [TripController::class, 'destroy']); // Видалення