<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TripController;
// Імпортуємо адмінський контролер з аліасом, щоб не було конфлікту імен
use App\Http\Controllers\Admin\TripController as AdminTripController;

/*
|--------------------------------------------------------------------------
| ПУБЛІЧНІ МАРШРУТИ (Для клієнтів)
|--------------------------------------------------------------------------
*/

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');

// Публічний каталог рейсів
Route::prefix('trips')->name('trips.')->group(function () {
    Route::get('/', [TripController::class, 'index'])->name('index');
    Route::get('/{trip}', [TripController::class, 'show'])->name('show'); 
});

/*
|--------------------------------------------------------------------------
| АДМІНІСТРАТИВНІ МАРШРУТИ (CRUD: перегляд, створення, редагування, видалення)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Використання resource гарантує створення маршрутів:
    // admin.trips.index, admin.trips.edit, admin.trips.update тощо.
    Route::resource('trips', AdminTripController::class);
});