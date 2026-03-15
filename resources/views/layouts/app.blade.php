<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyFleetDB</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        nav { position: relative; z-index: 100; background: #111827 !important; }
        main { position: relative; z-index: 1; }
    </style>
</head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            {{-- Включаємо навігацію, де ми вже виправили @endguest --}}
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{-- Використовуємо @yield для сумісності з твоїми існуючими в'юшками --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>