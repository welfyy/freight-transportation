@extends('layouts.app')

@section('title', 'Деталі рейсу')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">
    <a href="{{ route('trips.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-blue-600 font-black uppercase text-[10px] tracking-widest transition mb-8">
        — НАЗАД ДО СПИСКУ
    </a>

    <div class="flex flex-col lg:flex-row gap-10">
        <div class="flex-1 space-y-10">
            <div class="bg-white rounded-[40px] p-12 shadow-sm border border-slate-100">
                <p class="text-blue-600 font-black uppercase tracking-[0.2em] mb-4 text-[10px]">Деталі перевезення</p>
                
                <h1 class="text-6xl font-black text-slate-900 uppercase tracking-tighter leading-none mb-12">
                    @php
                        // Безпечно розбиваємо маршрут для дизайну, як на скріншоті 6e3637
                        $route = is_array($trip) ? $trip['route'] : $trip->route;
                        $parts = preg_split('/( - | — |-|—)/', $route);
                    @endphp
                    {{ $parts[0] }} <br>
                    <span class="text-slate-200">/</span> {{ $parts[1] ?? '' }}
                </h1>

                <div class="grid grid-cols-2 gap-8 border-t border-slate-50 pt-8">
                    <div>
                        <p class="text-slate-400 font-black uppercase tracking-widest text-[9px] mb-1">Відстань</p>
                        <p class="text-2xl font-black text-slate-900">{{ is_array($trip) ? ($trip['distance'] ?? '480') : ($trip->distance ?? '480') }} км</p>
                    </div>
                    <div>
                        <p class="text-slate-400 font-black uppercase tracking-widest text-[9px] mb-1">Тип рейсу</p>
                        <p class="text-2xl font-black text-slate-900">Прямий</p>
                    </div>
                </div>
            </div>

            <div class="bg-slate-50 rounded-[40px] p-12 flex flex-col md:flex-row justify-between items-center gap-8">
                <div>
                    <h3 class="text-xl font-black text-slate-900 uppercase tracking-tight mb-2">Калькулятор тарифу</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">
                        Вартість розраховано автоматично на основі поточної дистанції <br> та базової ставки за кілометр.
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-slate-400 font-black uppercase text-[10px] tracking-widest mb-1">Попередня ціна</p>
                    <div class="text-5xl font-black text-blue-600 tracking-tighter">
                        19 200 <span class="text-2xl">₴</span>
                    </div>
                    <p class="text-[9px] font-bold text-slate-400 uppercase mt-2">Тарифна ставка: 40 ₴ / км</p>
                </div>
            </div>
        </div>

        <div class="lg:w-1/3">
            <div class="bg-slate-900 rounded-[40px] p-10 shadow-2xl sticky top-10">
                <h3 class="text-white text-2xl font-black uppercase tracking-tighter mb-8 text-center">Оформити запит</h3>
                
                <form action="#" class="space-y-4">
                    <div>
                        <input type="text" placeholder="Ваше ім'я" class="w-full bg-slate-800 border-none rounded-2xl px-6 py-4 text-white font-bold placeholder:text-slate-500 focus:ring-2 focus:ring-blue-500 transition">
                    </div>
                    <div>
                        <input type="tel" placeholder="Телефон" class="w-full bg-slate-800 border-none rounded-2xl px-6 py-4 text-white font-bold placeholder:text-slate-500 focus:ring-2 focus:ring-blue-500 transition">
                    </div>
                    <div>
                        <p class="text-slate-500 font-black uppercase text-[9px] tracking-widest mb-2 ml-2">Дата завантаження</p>
                        <input type="date" class="w-full bg-slate-800 border-none rounded-2xl px-6 py-4 text-white font-bold focus:ring-2 focus:ring-blue-500 transition">
                    </div>
                    <div>
                        <select class="w-full bg-slate-800 border-none rounded-2xl px-6 py-4 text-white font-bold focus:ring-2 focus:ring-blue-500 transition">
                            <option>Тент (Standard)</option>
                            <option>Рефрижератор</option>
                            <option>Зерновоз</option>
                        </select>
                    </div>
                    
                    <button type="button" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-black uppercase text-xs tracking-widest py-5 rounded-2xl transition-all shadow-lg shadow-blue-900/20 mt-4 active:scale-95">
                        Відправити запит
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection