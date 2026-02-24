@extends('layouts.app')

@section('title', 'Каталог рейсів')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-10 text-left">
        <h1 class="text-4xl font-black text-slate-900 tracking-tight">Доступні рейси</h1>
        <p class="text-slate-500 mt-2 text-lg">Актуальна інформація про маршрути та їх статус</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @isset($allTrips)
            @foreach($allTrips as $id => $trip)
                <x-card 
                    :id="$id" 
                    :route="$trip['route']" 
                    :distance="$trip['distance']" 
                    :status="$trip['status']" 
                />
            @endforeach
        @else
            <p class="text-red-500">Дані про рейси не знайдено.</p>
        @endisset
    </div>
</div>
@endsection