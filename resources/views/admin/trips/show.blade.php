@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">
    <a href="{{ route('admin.trips.index') }}" class="text-blue-600 font-black uppercase text-[10px] tracking-widest hover:underline mb-8 block">← Назад до списку</a>

    <div class="bg-white shadow-2xl rounded-[2.5rem] p-12 border border-slate-100">
        <span class="bg-blue-600 text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase mb-6 inline-block">Деталі рейсу #{{ $trip->id }}</span>
        
        <h1 class="text-5xl font-black uppercase tracking-tighter text-slate-900 mb-8">{{ $trip->route }}</h1>
        
        <div class="grid grid-cols-2 gap-8 border-t border-slate-50 pt-8">
            <div>
                <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2">Статус маршруту</p>
                <p class="text-xl font-bold text-slate-900">{{ $trip->status }}</p>
            </div>
            <div>
                <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-2">Дата створення</p>
                <p class="text-xl font-bold text-slate-900">{{ $trip->created_at->format('d.m.Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection