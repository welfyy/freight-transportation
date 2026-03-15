<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trip; 
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * 1. ПЕРЕГЛЯД СПИСКУ (Index)
     */
    public function index()
    {
        $trips = Trip::all(); 
        return view('admin.trips.index', compact('trips'));
    }

    /**
     * 2. ФОРМА СТВОРЕННЯ (Create)
     */
    public function create()
    {
        return view('admin.trips.create');
    }

    /**
     * 3. ЗБЕРЕЖЕННЯ (Store)
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'route' => [
            'required',
            'string',
            'min:10', // Збільшимо мінімум, щоб не проходили короткі слова
            'regex:/^[\pL\s]+(\s?[\-—]\s?)[\pL\s]+$/u', // Обов'язково назва - назва (з дефісом або тире)
        ],
        'status' => 'required|string',
    ], [
        'route.required' => 'Назва маршруту є обов’язковою.',
        'route.min'      => 'Назва маршруту занадто коротка (мінімум 10 символів).',
        'route.regex'    => 'Формат маршруту має бути: Місто — Місто (використовуйте тире).',
    ]);

    \App\Models\Trip::create($validated);

    return redirect()->route('admin.trips.index')->with('success', 'Рейс успішно додано до MyFleetDB!');
}

    /**
     * 4. ДЕТАЛІ (Show)
     */
    public function show(Trip $trip) 
    {
        return view('admin.trips.show', compact('trip'));
    }

    /**
     * 5. ФОРМА РЕДАГУВАННЯ (Edit)
     * Знаходить рейс і передає його у в'юшку для редагування.
     */
    public function edit(Trip $trip)
    {
        // Повертаємо файл admin/trips-edit.blade.php (або trips/edit залежно від твоєї структури)
        return view('admin.trips-edit', compact('trip'));
    }

    /**
     * 6. ОНОВЛЕННЯ ДАНИХ (Update)
     * Отримує змінені дані з форми та оновлює запис у базі.
     */
    public function update(Request $request, Trip $trip)
    {
        // Валідуємо дані перед оновленням
        $validated = $request->validate([
            'route' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        // Оновлюємо запис у базі
        $trip->update($validated);

        return redirect()->route('admin.trips.index')->with('success', 'Рейс успішно оновлено!');
    }

    /**
     * 7. ВИДАЛЕННЯ (Destroy)
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('admin.trips.index')->with('success', 'Рейс успішно видалено з бази');
    }
}