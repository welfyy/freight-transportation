@extends('layouts.app')

@section('title', 'Каталог рейсів')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <div class="mb-10 text-left">
        <h1 class="text-4xl font-black text-slate-900 tracking-tight uppercase">Доступні рейси</h1>
        <p class="text-slate-500 mt-2 text-lg">Актуальна інформація про маршрути та їх статус</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        {{-- Використовуємо @forelse, щоб зручно обробити порожню базу --}}
        @forelse($allTrips as $trip)
            <x-card 
                {{-- ПРАВИЛЬНО: беремо реальний ID з об'єкта бази даних --}}
                :id="$trip->id" 
                {{-- ПРАВИЛЬНО: звертаємось до полів об'єкта через стрілку --}}
                :route="$trip->route" 
                :distance="$trip->distance ?? '540'" 
                :status="$trip->status" 
            />
        @empty
            <div class="col-span-full p-20 text-center bg-white rounded-[2.5rem] border border-dashed border-slate-200">
                <p class="text-slate-400 font-bold uppercase tracking-widest text-sm">
                    Рейсів поки немає. Додайте їх в адмін-панелі.
                </p>
            </div>
        @endforelse
    </div>
</div>
@endsection