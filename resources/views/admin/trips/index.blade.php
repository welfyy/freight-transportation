@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-black uppercase tracking-tighter text-slate-900">Адміністрування рейсів</h1>
        <span class="bg-blue-600 text-white text-[10px] font-black px-3 py-1 rounded-full uppercase">Admin Panel</span>
    </div>

    {{-- Форма додавання --}}
    <div class="mb-10 bg-slate-900 p-8 rounded-[2.5rem] shadow-xl">
        <h2 class="text-white font-black uppercase text-xs tracking-[0.2em] mb-6">Додати новий маршрут</h2>
        <form action="{{ route('admin.trips.store') }}" method="POST" class="flex flex-col md:flex-row gap-4">
            @csrf
            <div class="flex-1">
                <input type="text" name="route" value="{{ old('route') }}" placeholder="НАЗВА МАРШРУТУ (НАПР. КИЇВ — ЛЬВІВ)" 
                       class="w-full bg-slate-800 border-none rounded-2xl px-6 py-4 text-white font-bold placeholder:text-slate-500 focus:ring-2 focus:ring-blue-500 transition @error('route') ring-2 ring-red-500 @enderror" required>
                @error('route') <p class="text-red-400 text-[10px] mt-2 font-bold uppercase">{{ $message }}</p> @enderror
            </div>
            <div class="w-full md:w-64">
                <select name="status" class="w-full bg-slate-800 border-none rounded-2xl px-6 py-4 text-white font-bold focus:ring-2 focus:ring-blue-500 transition">
                    <option value="Заплановано">ЗАПЛАНОВАНО</option>
                    <option value="У дорозі">У ДОРОЗІ</option>
                    <option value="Завершено">ЗАВЕРШЕНО</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-black uppercase text-xs tracking-widest px-10 py-4 rounded-2xl transition-all shadow-lg active:scale-95">
                ДОДАТИ
            </button>
        </form>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-500 text-white font-black uppercase text-xs tracking-widest rounded-2xl shadow-lg shadow-green-200 animate-pulse">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-2xl rounded-[2.5rem] overflow-hidden border border-slate-100">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 border-b border-slate-100">
                <tr>
                    <th class="p-6 text-[11px] font-black uppercase text-slate-400 tracking-widest">ID</th>
                    <th class="p-6 text-[11px] font-black uppercase text-slate-400 tracking-widest">Маршрут</th>
                    <th class="p-6 text-[11px] font-black uppercase text-slate-400 tracking-widest">Статус</th>
                    <th class="p-6 text-[11px] font-black uppercase text-slate-400 tracking-widest text-right">Дії</th>
                </tr>
            </thead>
            <tbody>
                @forelse($trips as $trip)
                <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors">
                    <td class="p-6 font-bold text-slate-400">#{{ $trip->id }}</td>
                    <td class="p-6 font-black text-slate-900 uppercase text-lg">{{ $trip->route }}</td>
                    <td class="p-6">
                        @php
                            $statusClasses = [
                                'Заплановано' => 'bg-slate-100 text-slate-600',
                                'У дорозі' => 'bg-orange-100 text-orange-600',
                                'Завершено' => 'bg-green-100 text-green-600'
                            ];
                        @endphp
                        <span class="text-[10px] font-black px-3 py-1 rounded-full uppercase {{ $statusClasses[$trip->status] ?? 'bg-slate-100 text-slate-600' }}">
                            ● {{ $trip->status }}
                        </span>
                    </td>
                    <td class="p-6">
                        <div class="flex justify-end gap-6 items-center">
                            <a href="{{ route('admin.trips.show', $trip->id) }}" class="text-blue-600 font-black uppercase text-[11px] tracking-widest hover:text-blue-800 transition">Переглянути</a>
                            
                            {{-- ТУТ ВИПРАВЛЕНО: Додано робоче посилання на редагування --}}
                            <a href="{{ route('admin.trips.edit', $trip->id) }}" class="text-slate-400 font-black uppercase text-[11px] tracking-widest hover:text-slate-900 transition">Редагувати</a>

                            <form action="{{ route('admin.trips.destroy', $trip->id) }}" method="POST" onsubmit="return confirm('Видалити цей рейс?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 font-black uppercase text-[11px] tracking-widest hover:text-red-700 transition">Видалити</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-20 text-center text-slate-400 font-bold uppercase tracking-widest text-xs">
                        Рейсів поки немає. Скористайтеся формою вище, щоб додати перший!
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection