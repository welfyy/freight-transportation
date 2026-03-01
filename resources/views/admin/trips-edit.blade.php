@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">
    <div class="mb-10 bg-slate-900 p-12 rounded-[3rem] shadow-2xl">
        <h1 class="text-white text-3xl font-black uppercase tracking-tighter mb-8">Редагувати рейс #{{ $trip->id }}</h1>
        
        <form action="{{ route('admin.trips.update', $trip->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="text-slate-500 font-black uppercase text-[10px] tracking-widest ml-4 mb-2 block">Назва маршруту</label>
                <input type="text" name="route" value="{{ $trip->route }}" 
                       class="w-full bg-slate-800 border-none rounded-2xl px-8 py-5 text-white font-bold focus:ring-2 focus:ring-blue-500 transition">
            </div>

            <div>
                <label class="text-slate-500 font-black uppercase text-[10px] tracking-widest ml-4 mb-2 block">Поточний статус</label>
                <select name="status" class="w-full bg-slate-800 border-none rounded-2xl px-8 py-5 text-white font-bold focus:ring-2 focus:ring-blue-500 transition">
                    <option value="Заплановано" {{ $trip->status == 'Заплановано' ? 'selected' : '' }}>ЗАПЛАНОВАНО</option>
                    <option value="У дорозі" {{ $trip->status == 'У дорозі' ? 'selected' : '' }}>У ДОРОЗІ</option>
                    <option value="Завершено" {{ $trip->status == 'Завершено' ? 'selected' : '' }}>ЗАВЕРШЕНО</option>
                </select>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-500 text-white font-black uppercase text-xs tracking-widest py-5 rounded-2xl transition-all shadow-lg active:scale-95">
                    ЗБЕРЕГТИ ЗМІНИ
                </button>
                <a href="{{ route('admin.trips.index') }}" class="px-10 py-5 bg-slate-800 text-slate-400 font-black uppercase text-xs tracking-widest rounded-2xl hover:bg-slate-700 transition">
                    СКАСУВАТИ
                </a>
            </div>
        </form>
    </div>
</div>
@endsection