@props(['id', 'route', 'distance', 'status'])

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all p-6">
    <div class="flex justify-between items-start mb-6">
        <div class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wider">
            Рейс #{{ $id }}
        </div>
        <div class="flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full {{ $status == 'Завершено' ? 'bg-green-500' : 'bg-amber-500' }}"></span>
            <span class="text-xs font-semibold text-slate-500">{{ $status }}</span>
        </div>
    </div>

    <h3 class="text-xl font-bold text-slate-800 mb-4">{{ $route }}</h3>
    
    <div class="space-y-3 mb-6">
        <div class="flex items-center text-sm text-slate-500 gap-2">
            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
            <span>Відстань: <strong>{{ $distance }} км</strong></span>
        </div>
    </div>

    <a href="{{ url('/trips/'.$id) }}" class="block text-center py-3 bg-slate-50 text-slate-700 rounded-xl text-sm font-bold hover:bg-blue-600 hover:text-white transition-colors">
        Детальніше
    </a>
</div>