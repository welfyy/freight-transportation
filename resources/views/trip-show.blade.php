@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-6">
    
    <div class="mb-8">
        <a href="{{ url('/trips') }}" class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 hover:text-blue-600 transition flex items-center group">
            <span class="mr-2 group-hover:-translate-x-1 transition-transform">←</span> Назад до списку
        </a>
    </div>

    <div class="flex flex-col lg:flex-row gap-8 items-stretch mb-10">
        
        <div class="lg:w-2/3 flex flex-col bg-white rounded-[32px] p-10 shadow-sm border border-slate-100">
            <div class="mb-auto">
                <p class="text-blue-600 font-black uppercase tracking-[0.2em] mb-4 text-[10px]">Деталі перевезення</p>
                <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter leading-tight mb-8">
                    {{ explode(' - ', $trip['route'])[0] }} <br>
                    <span class="text-slate-200">/</span> {{ explode(' - ', $trip['route'])[1] }}
                </h1>

                <div class="grid grid-cols-2 gap-8 border-t border-slate-50 pt-8">
                    <div>
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Відстань</p>
                        <p class="text-2xl font-black text-slate-900">{{ $trip['distance'] }} км</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Тип рейсу</p>
                        <p class="text-2xl font-black text-slate-900 italic">Прямий</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:w-1/3 bg-slate-950 rounded-[32px] p-8 text-white shadow-2xl">
            <h2 class="text-2xl font-black uppercase mb-6 tracking-tighter">Оформити запит</h2>
            
            <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Запит надіслано успішно!');">
                <div class="space-y-4">
                    <input type="text" required placeholder="Ваше ім'я" class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-sm outline-none focus:border-blue-600 focus:bg-white/10 transition-all">
                    
                    <input type="tel" required placeholder="Телефон" class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-sm outline-none focus:border-blue-600 focus:bg-white/10 transition-all">
                    
                    <div>
                        <label class="block text-[8px] font-black uppercase text-slate-500 mb-1 ml-1 tracking-widest">Дата завантаження</label>
                        <input type="date" required class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-sm outline-none focus:border-blue-600 text-slate-400 transition-all">
                    </div>

                    <select class="w-full bg-slate-900 border border-white/10 rounded-xl p-4 text-sm outline-none cursor-pointer hover:border-slate-700 transition-colors">
                        <option>Тент (Standard)</option>
                        <option>Рефрижератор</option>
                        <option>Зерновоз</option>
                    </select>

                    <button type="submit" class="w-full py-5 bg-blue-600 hover:bg-blue-500 active:scale-[0.97] text-white rounded-xl font-black uppercase tracking-widest text-[10px] mt-2 transition-all shadow-lg shadow-blue-600/20 active:shadow-inner cursor-pointer">
                        Відправити запит
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="bg-slate-50 rounded-[32px] p-10 border border-slate-100 flex flex-col md:flex-row justify-between items-center gap-6">
        <div class="max-w-md">
            <h3 class="text-xl font-black uppercase tracking-tight text-slate-900 mb-2">Калькулятор тарифу</h3>
            <p class="text-sm text-slate-500 leading-relaxed font-medium">Вартість розраховано автоматично на основі поточної дистанції та базової ставки за кілометр.</p>
        </div>
        
        <div class="text-center md:text-right bg-white px-10 py-6 rounded-3xl shadow-sm border border-slate-100 min-w-[240px]">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Попередня ціна</p>
            <div class="text-5xl font-black text-blue-600 tracking-tighter">
                {{ number_format($trip['distance'] * 40, 0, ',', ' ') }} ₴
            </div>
            <p class="text-[9px] text-slate-400 font-bold uppercase mt-2 italic">Тарифна ставка: 40 ₴ / км</p>
        </div>
    </div>

</div>
@endsection