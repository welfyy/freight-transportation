@extends('layouts.app')

@section('title', 'Про проєкт')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <section class="mb-16">
        <span class="text-blue-600 font-bold tracking-widest uppercase text-xs">Інформація</span>
        <h1 class="text-5xl font-black text-slate-900 mt-2 mb-6 tracking-tight">Про проєкт</h1>
        <p class="text-xl text-slate-500 leading-relaxed">
            Ця система створена для управління логістичними процесами: від моніторингу рейсів до обліку транспортного парку.
        </p>
    </section>

    <div class="space-y-12 mb-16">
        <div class="flex gap-6">
            <div class="text-3xl font-bold text-blue-200">01</div>
            <div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Мета розробки</h3>
                <p class="text-slate-600 leading-relaxed">
                    Створення єдиного цифрового простору для диспетчерів та водіїв, що дозволяє уникнути помилок при плануванні маршрутів.
                </p>
            </div>
        </div>

        <div class="flex gap-6">
            <div class="text-3xl font-bold text-blue-200">02</div>
            <div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Технологічний стек</h3>
                <p class="text-slate-600 leading-relaxed">
                    Проєкт реалізовано на <strong>Laravel 11</strong>. Для бази даних обрано <strong>MySQL</strong>, що забезпечує швидку роботу з великими обсягами рейсів.
                </p>
            </div>
        </div>

        <div class="flex gap-6">
            <div class="text-3xl font-bold text-blue-200">03</div>
            <div>
                <h3 class="text-xl font-bold text-slate-800 mb-2">Основні модулі</h3>
                <p class="text-slate-600 leading-relaxed">
                    Система включає каталог маршрутів, базу транспортних засобів, реєстр водіїв та журнал статусів перевезень.
                </p>
            </div>
        </div>
    </div>

    <div class="bg-gray-100 rounded-3xl p-10 flex flex-col md:flex-row justify-between items-center border border-gray-200">
        <div>
            <p class="text-sm font-medium text-gray-400 uppercase mb-1">Виконавець</p>
            <h2 class="text-2xl font-bold text-slate-900">Костриця Іван</h2>
            <p class="text-slate-500">Курсова робота • 2025</p>
        </div>
        <div class="mt-6 md:mt-0">
            <a href="{{ url('/trips') }}" class="bg-blue-600 text-white px-8 py-4 rounded-2xl font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                До каталогу рейсів
            </a>
        </div>
    </div>
</div>
@endsection