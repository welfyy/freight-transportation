@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-6">
    
    <div class="mb-8">
        <a href="{{ url('/trips') }}" class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 hover:text-blue-600 transition">
            ← Назад до каталогів
        </a>
    </div>

    <div class="flex flex-col lg:flex-row gap-8 items-start mb-12">
        
        <div class="lg:w-2/3 w-full bg-white rounded-[32px] p-10 shadow-sm border border-slate-100">
            <p class="text-blue-600 font-black uppercase tracking-[0.2em] mb-4 text-[10px]">Інформація про напрямок</p>
            <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter leading-tight mb-8">
                {{ explode(' - ', $trip['route'])[0] }} <br>
                <span class="text-slate-200">/</span> {{ explode(' - ', $trip['route'])[1] }}
            </h1>

            <div class="flex gap-10 border-t border-slate-50 pt-8">
                <div>
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Дистанція</p>
                    <p class="text-2xl font-black text-slate-900">{{ $trip['distance'] }} км</p>
                </div>
                <div>
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Термін доставки</p>
                    <p class="text-2xl font-black text-slate-900">від 24 год</p>
                </div>
            </div>
        </div>

        <div class="lg:w-1/3 w-full bg-slate-950 rounded-[32px] p-8 text-white shadow-2xl">
            <h2 class="text-2xl font-black uppercase mb-6 tracking-tighter">Бронювання</h2>
            
            <form action="#" class="space-y-4">
                <input type="text" placeholder="Ваше ім'я" class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-sm outline-none focus:border-blue-600 transition-all">
                <input type="tel" placeholder="Номер телефону" class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-sm outline-none focus:border-blue-600 transition-all">
                
                <div>
                    <label class="block text-[8px] font-black uppercase text-slate-500 mb-1 ml-1">Бажана дата виїзду</label>
                    <input type="date" class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-sm outline-none focus:border-blue-600 transition-all text-slate-400">
                </div>

                <select class="w-full bg-slate-900 border border-white/10 rounded-xl p-4 text-sm outline-none cursor-pointer">
                    <option>Тент (Standard)</option>
                    <option>Рефрижератор</option>
                    <option>Зерновоз</option>
                </select>

                <button class="w-full py-5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-black uppercase tracking-widest text-[10px] mt-2 transition-all">
                    Відправити запит
                </button>
            </form>
        </div>
    </div>

    <div class="bg-blue-50 rounded-[32px] p-10 border border-blue-100">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="max-w-md">
                <h3 class="text-xl font-black uppercase tracking-tight text-slate-900 mb-2">Калькулятор вартості</h3>
                <p class="text-sm text-slate-600 font-medium">Попередній розрахунок на основі відстані маршруту та базового тарифу компанії.</p>
            </div>
            
            <div class="text-center md:text-right">
                <p class="text-[10px] font-black text-blue-400 uppercase tracking-[0.2em] mb-1">Орієнтовна ціна</p>
                <div class="text-5xl font-black text-blue-600 tracking-tighter">
                    {{ number_format($trip['distance'] * 40, 0, ',', ' ') }} ₴
                </div>
                <p class="text-[9px] text-blue-300 font-bold uppercase mt-2">Тариф: 40 ₴ / км</p>
            </div>
        </div>
    </div>

</div>
@endsection