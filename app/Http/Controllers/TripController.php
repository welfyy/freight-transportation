<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripController extends Controller
{
    // Статичний масив даних (імітація таблиці Trips з вашої курсової)
    private $trips = [
        1 => [
            'route' => 'Київ - Львів',
            'driver' => 'Петренко О.М.',
            'vehicle' => 'DAF XF (AA 1234 BB)',
            'date' => '2025-01-10',
            'status' => 'Завершено'
        ],
        2 => [
            'route' => 'Одеса - Дніпро',
            'driver' => 'Сидоренко В.П.',
            'vehicle' => 'Volvo FH (BC 5678 CC)',
            'date' => '2025-01-12',
            'status' => 'У дорозі'
        ],
        3 => [
            'route' => 'Харків - Київ',
            'driver' => 'Іванов І.І.',
            'vehicle' => 'Scania R450 (AI 9101 EE)',
            'date' => '2025-01-15',
            'status' => 'Заплановано'
        ]
    ];

    // Список усіх рейсів
    public function index()
    {
        $output = "<h1>Список рейсів</h1><ul>";
        foreach ($this->trips as $id => $trip) {
            $output .= "<li>
                            <strong>Рейс №$id</strong>: {$trip['route']} ({$trip['date']}) 
                            <a href='/trips/$id'>Детальніше</a>
                        </li>";
        }
        $output .= "</ul><p><a href='/'>На головну</a></p>";
        
        return $output;
    }

    // Деталі конкретного рейсу
    public function show($id)
    {
        // Перевірка, чи існує рейс із таким ID
        if (!isset($this->trips[$id])) {
            return "<h1>Помилка</h1><p>Рейс №$id не знайдено.</p><a href='/trips'>Назад до списку</a>";
        }

        $trip = $this->trips[$id];
        
        return "<h1>Деталі рейсу №$id</h1>
                <p><strong>Маршрут:</strong> {$trip['route']}</p>
                <p><strong>Водій:</strong> {$trip['driver']}</p>
                <p><strong>Автомобіль:</strong> {$trip['vehicle']}</p>
                <p><strong>Дата відправлення:</strong> {$trip['date']}</p>
                <p><strong>Статус:</strong> {$trip['status']}</p>
                <hr>
                <a href='/trips'>Назад до списку</a>";
    }
}