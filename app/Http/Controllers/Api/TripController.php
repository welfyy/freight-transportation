<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    // GET /api/trips — список усіх рейсів
    public function index()
    {
        return response()->json(Trip::all(), 200, [], JSON_UNESCAPED_UNICODE);
    }

    // GET /api/trips/{id} — дані про конкретний рейс
    public function show($id)
    {
        $trip = Trip::find($id);
        if (!$trip) {
            return response()->json(['message' => 'Рейс не знайдено'], 404, [], JSON_UNESCAPED_UNICODE);
        }
        return response()->json($trip, 200, [], JSON_UNESCAPED_UNICODE);
    }

    // POST /api/trips/store — додавання нового рейсу
    public function store(Request $request)
    {
        // Базова перевірка, щоб поля не були порожніми
        $validated = $request->validate([
            'route' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        $trip = Trip::create($validated);
        return response()->json($trip, 201, [], JSON_UNESCAPED_UNICODE);
    }

    // PUT/PATCH /api/trips/{id} — редагування
    public function update(Request $request, $id)
    {
        $trip = Trip::find($id);
        if (!$trip) {
            return response()->json(['message' => 'Об\'єкт не знайдено'], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $trip->update($request->all());
        return response()->json($trip, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function destroy($id)
    {
        $trip = Trip::find($id);
        if (!$trip) {
            return response()->json(['message' => 'Об\'єкт не знайдено'], 404, [], JSON_UNESCAPED_UNICODE);
        }

        $trip->delete();
        return response()->json(['message' => 'Успішно видалено'], 200, [], JSON_UNESCAPED_UNICODE);
    }
}