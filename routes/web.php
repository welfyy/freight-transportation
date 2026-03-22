<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\Admin\TripController as AdminTripController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');

Route::prefix('trips')->name('trips.')->group(function () {
    Route::get('/', [TripController::class, 'index'])->name('index');
    Route::get('/{trip}', [TripController::class, 'show'])->name('show'); 
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        
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