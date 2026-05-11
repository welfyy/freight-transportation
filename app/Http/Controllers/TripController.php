public function index(Request $request)
{
    try {
        $query = Trip::query();

        if ($request->has('category_id') && $request->category_id != null) {
            $query->where('vehicle_id', $request->category_id);
        }

        $trips = $query->get();

        $formattedTrips = $trips->map(function($trip, $index) {
            // Масив маршрутів для імітації
            $routes = [
                1 => "Київ — Одеса",
                2 => "Львів — Варшава",
                3 => "Дніпро — Краків",
                4 => "Харків — Берлін"
            ];

            // 1. Виправляємо ID: беремо trip_id, якщо він null — використовуємо індекс + 1
            $realId = $trip->trip_id ?? ($index + 1);

            // 2. Формуємо назву: перевіряємо чи є route_id у списку вище
            // Якщо в базі route_id порожній, показуємо номер рейсу
            $routeName = isset($routes[$trip->route_id]) 
                ? $routes[$trip->route_id] 
                : "Рейс #" . $realId;

            return [
                'id' => (int)$realId,
                'title' => $routeName, 
                'price' => $trip->price ? (float)$trip->price : 0.0,
                'departure' => $trip->departure_date ?? 'Дата уточнюється',
                'image' => "https://images.unsplash.com/photo-1519003722824-194d4455a60c?q=80&w=400&h=250&fit=crop",
                'category_id' => $trip->vehicle_id ?? 1
            ];
        });

        return response()->json($formattedTrips);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}