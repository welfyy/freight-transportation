<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip; // Обов'язково імпортуємо модель

class TripSeeder extends Seeder
{
    /**
     * Запуск наповнення бази даних.
     */
    public function run(): void
    {
        // Список тестових рейсів для автоматичного заповнення
        $trips = [
            ['route' => 'Київ — Львів', 'status' => 'Заплановано'],
            ['route' => 'Одеса — Варшава', 'status' => 'У дорозі'],
            ['route' => 'Дніпро — Прага', 'status' => 'Заплановано'],
            ['route' => 'Харків — Берлін', 'status' => 'Завершено'],
            ['route' => 'Вінниця — Краків', 'status' => 'У дорозі'],
            ['route' => 'Львів — Відень', 'status' => 'Заплановано'],
        ];

        foreach ($trips as $trip) {
            Trip::create($trip); // Створюємо кожен запис у базі
        }
    }
}