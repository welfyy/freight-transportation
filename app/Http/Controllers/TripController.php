<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip; // Імпортуємо модель, щоб брати дані з бази

class TripController extends Controller
{
    /**
     * ПЕРЕГЛЯД КАТАЛОГУ (Для звичайних користувачів)
     */
    public function index()
    {
        // Отримуємо ВСІ реальні рейси з бази даних
        $allTrips = Trip::all(); 

        // Передаємо їх у шаблон catalog.blade.php
        return view('catalog', compact('allTrips'));
    }

    /**
     * ДЕТАЛЬНА СТОРІНКА РЕЙСУ
     */
    public function show($id)
    {
        // Шукаємо рейс у базі за ID. Якщо не знайдено — видасть 404
        $trip = Trip::findOrFail($id);

        return view('trip-show', compact('trip'));
    }
}