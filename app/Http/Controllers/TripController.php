<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripController extends Controller
{
    // Масив даних (тепер з ключем distance, щоб каталог його бачив)
    private $trips = [
        1 => [
            'route' => 'Київ - Львів',
            'driver' => 'Петренко О.М.',
            'vehicle' => 'DAF XF (AA 1234 BB)',
            'date' => '2025-01-10',
            'distance' => '540', // Додано для сумісності з вашим catalog.blade.php
            'status' => 'Завершено'
        ],
        2 => [
            'route' => 'Одеса - Дніпро',
            'driver' => 'Сидоренко В.П.',
            'vehicle' => 'Volvo FH (BC 5678 CC)',
            'date' => '2025-01-12',
            'distance' => '450',
            'status' => 'У дорозі'
        ],
        3 => [
            'route' => 'Харків - Київ',
            'driver' => 'Іванов І.І.',
            'vehicle' => 'Scania R450 (AI 9101 EE)',
            'date' => '2025-01-15',
            'distance' => '480',
            'status' => 'Заплановано'
        ]
    ];

    public function index()
    {
        // Передаємо саме змінну $this->trips
        return view('catalog', ['allTrips' => $this->trips]);
    }

    public function show($id)
    {
        if (!isset($this->trips[$id])) {
            abort(404, "Рейс №$id не знайдено");
        }

        return view('trip-show', [
            'id' => $id,
            'trip' => $this->trips[$id]
        ]);
    }
}