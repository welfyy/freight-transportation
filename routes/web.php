<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\Admin\TripController as AdminTripController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');

// Публічний каталог (тільки перегляд)
Route::prefix('trips')->name('trips.')->group(function () {
    Route::get('/', [TripController::class, 'index'])->name('index');
    Route::get('/{trip}', [TripController::class, 'show'])->name('show'); 
});

// Стандартний дашборд Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Група маршрутів профілю та АДМІНКИ
Route::middleware('auth')->group(function () {
    
    // Редагування профілю користувача
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Твоя АДМІНКА (CRUD рейсів) з ПЕРЕВІРКОЮ EMAIL
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // Ми обгортаємо ресурсний контролер перевіркою
        Route::group(['middleware' => function ($request, $next) {
            if (auth()->user()->email !== 'vanyakostritsia@gmail.com') {
                abort(403, 'Доступ заборонено! Тільки для головного адміністратора.');
            }
            return $next($request);
        }], function () {
            Route::resource('trips', AdminTripController::class);
        });
        
    });
});

require __DIR__.'/auth.php';