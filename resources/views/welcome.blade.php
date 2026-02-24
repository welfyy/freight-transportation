@extends('layouts.app')

@section('title', 'Головна — Логістичні рішення')

@section('content')
<div class="space-y-20 -mt-10">

    <section class="relative bg-slate-900 rounded-3xl overflow-hidden shadow-2xl">
        <div class="absolute inset-0 opacity-20">
            <img src="https://images.unsplash.com/photo-1519003722824-194d4455a60c?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover" alt="Truck background">
        </div>
        <div class="relative z-10 p-12 lg:p-24 flex flex-col items-center text-center">
            <span class="bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.3em] px-4 py-2 rounded-full mb-6">Expert Logistics Solutions</span>
            <h1 class="text-4xl lg:text-7xl font-black text-white mb-8 tracking-tighter uppercase leading-none">
                Ваш вантаж — <br><span class="text-blue-500">наша відповідальність</span>
            </h1>
            <p class="text-slate-400 text-lg lg:text-xl max-w-2xl mb-10 font-medium">
                Автоматизована система MyFleetDB забезпечує повний контроль над ланцюжком постачання, від маршруту до водія.
            </p>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="{{ url('/trips') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-5 rounded-xl font-black uppercase text-sm tracking-widest transition shadow-lg shadow-blue-500/20">
                    Каталог рейсів
                </a>
                <a href="{{ url('/about') }}" class="bg-white/10 hover:bg-white/20 backdrop-blur text-white border border-white/20 px-10 py-5 rounded-xl font-black uppercase text-sm tracking-widest transition">
                    Про проєкт
                </a>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tighter italic italic">Чому обирають нас</h2>
            <div class="h-1 w-20 bg-blue-600 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
            <div class="group">
                <div class="w-20 h-20 bg-slate-100 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-xl font-black text-slate-900 mb-3 uppercase tracking-tight">Швидкість</h3>
                <p class="text-slate-500 text-sm leading-relaxed">Оптимізація маршрутів за допомогою інтелектуальних алгоритмів нашої БД.</p>
            </div>

            <div class="group">
                <div class="w-20 h-20 bg-slate-100 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="text-xl font-black text-slate-900 mb-3 uppercase tracking-tight">Безпека</h3>
                <p class="text-slate-500 text-sm leading-relaxed">Повний моніторинг стану транспортних засобів та кваліфікації водіїв.</p>
            </div>

            <div class="group">
                <div class="w-20 h-20 bg-slate-100 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-xl font-black text-slate-900 mb-3 uppercase tracking-tight">Прозорість</h3>
                <p class="text-slate-500 text-sm leading-relaxed">Всі витрати та деталі рейсів доступні в декілька кліків через інтерфейс MyFleetDB.</p>
            </div>
        </div>
    </section>

    <section class="bg-blue-600 py-16 rounded-[3rem]">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8 text-white text-center">
            <div>
                <p class="text-4xl font-black mb-1">10+</p>
                <p class="text-blue-100 text-xs font-bold uppercase tracking-widest">Маршрутів</p>
            </div>
            <div>
                <p class="text-4xl font-black mb-1">5000+</p>
                <p class="text-blue-100 text-xs font-bold uppercase tracking-widest">км щомісяця</p>
            </div>
            <div>
                <p class="text-4xl font-black mb-1">24/7</p>
                <p class="text-blue-100 text-xs font-bold uppercase tracking-widest">Підтримка</p>
            </div>
            <div>
                <p class="text-4xl font-black mb-1">100%</p>
                <p class="text-blue-100 text-xs font-bold uppercase tracking-widest">Звітність</p>
            </div>
        </div>
    </section>

</div>
@endsection