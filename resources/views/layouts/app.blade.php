<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | MyFleetDB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body class="flex flex-col min-h-screen"> <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <span class="font-black text-xl">M</span>
                </div>
                <span class="text-xl font-black text-slate-900 tracking-tighter">MyFleetDB</span>
            </a>
            <div class="hidden md:flex items-center gap-10 text-sm font-bold text-slate-500 uppercase tracking-widest">
                <a href="/" class="hover:text-blue-600 transition">Головна</a>
                <a href="/trips" class="hover:text-blue-600 transition">Каталог рейсів</a>
                <a href="/about" class="hover:text-blue-600 transition">Про розробника</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow py-12">
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12 border-b border-white/5 pb-12">
                <div>
                    <h3 class="text-lg font-black uppercase tracking-tighter mb-6 text-blue-500">MyFleetDB</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Система автоматизації логістичних процесів. Розроблено для оптимізації обліку рейсів, водіїв та автотранспорту.</p>
                </div>
                <div>
                    <h3 class="text-xs font-black uppercase tracking-[0.2em] mb-6 text-slate-500">Навігація</h3>
                    <ul class="space-y-4 text-sm font-bold">
                        <li><a href="/" class="hover:text-blue-500 transition">Головна сторінка</a></li>
                        <li><a href="/trips" class="hover:text-blue-500 transition">Моніторинг рейсів</a></li>
                        <li><a href="/about" class="hover:text-blue-500 transition">Технічна документація</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xs font-black uppercase tracking-[0.2em] mb-6 text-slate-500">Курсова робота</h3>
                    <p class="text-sm text-slate-400 mb-2">Виконав: <span class="text-white">Костриця Іван</span></p>
                    <p class="text-sm text-slate-400 italic">НУБіП України, 2025</p>
                </div>
            </div>
            <div class="text-center text-[10px] font-black uppercase tracking-[0.5em] text-slate-600">
                &copy; 2025 Всі права захищені
            </div>
        </div>
    </footer>

</body>
</html>