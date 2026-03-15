<nav x-data="{ open: false }" class="bg-gray-900 border-b border-gray-800 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-white">
                        {{ __('Головна') }}
                    </x-nav-link>
                    <x-nav-link :href="route('trips.index')" :active="request()->routeIs('trips.*')" class="text-white">
                        {{ __('Каталог рейсів') }}
                    </x-nav-link>
                    
                    {{-- ТІЛЬКИ ТИ БАЧИШ ЦЕ ПОСИЛАННЯ --}}
                    @if(auth()->check() && auth()->user()->email === 'maksym@example.com')
                        <x-nav-link :href="route('admin.trips.index')" :active="request()->routeIs('admin.trips.*')" class="text-white">
                            {{ __('Адмін-панель CRUD') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Профіль') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Вихід') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                @guest
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="text-sm text-white underline font-bold uppercase tracking-widest hover:text-blue-400">Увійти</a>
                        <a href="{{ route('register') }}" class="text-sm text-white underline font-bold uppercase tracking-widest hover:text-blue-400">Реєстрація</a>
                    </div>
                @endguest
            </div>
        </div>
    </div>

    {{-- Мобільне меню --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-900">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-white">
                {{ __('Головна') }}
            </x-responsive-nav-link>
        </div>

        @auth
            <div class="pt-4 pb-1 border-t border-gray-700">
                <div class="px-4 text-white">
                    <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-white">
                        {{ __('Профіль') }}
                    </x-responsive-nav-link>

                    @if(auth()->user()->email === 'vanyakostritsia@gmail.com')
                        <x-responsive-nav-link :href="route('admin.trips.index')" class="text-white">
                            {{ __('Адмін-панель CRUD') }}
                        </x-responsive-nav-link>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-white">
                            {{ __('Вихід') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
        
        @guest
            <div class="pt-4 pb-1 border-t border-gray-700">
                <x-responsive-nav-link :href="route('login')" class="text-white">Увійти</x-responsive-nav-link>
            </div>
        @endguest
    </div>
</nav>