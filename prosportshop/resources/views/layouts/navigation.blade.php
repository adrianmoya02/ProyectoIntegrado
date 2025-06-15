<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('storage/logo.jpg') }}" alt="Logo de la tienda" class="block w-auto h-16" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Nuestros productos') }}
                    </x-nav-link>

                    @auth
                        <x-nav-link :href="route('productos.vender')" :active="request()->routeIs('productos.vender')">
                            {{ __('Vender producto') }}
                        </x-nav-link>
                        <x-nav-link :href="route('productos.mis_compras')" :active="request()->routeIs('productos.mis_compras')">
                            {{ __('Mis Compras') }}
                        </x-nav-link>

                        <x-nav-link :href="route('movimientos.create')" :active="request()->routeIs('movimientos.create')">
                            {{ __('Movimientos de Saldo') }}
                        </x-nav-link>

                        <x-nav-link :href="route('productos.devolver_vista')" :active="request()->routeIs('productos.devolver_vista')">
                            {{ __('Devolver Productos') }}
                        </x-nav-link>
                        
                       @if(Auth::user()->rol === 'admin')
                           <x-nav-link :href="route('products.create')" :active="request()->routeIs('products.create')">
                                {{ __('Añadir producto') }}
                        </x-nav-link>
                        <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                                {{ __('Backend') }}
                            </x-nav-link>     
                        @endif
                    @endauth
                </div>
                <!-- Dark Mode Toggle -->
    <div x-data="{ dark: localStorage.getItem('theme') === 'dark' }"
     x-init="$watch('dark', val => { 
         document.documentElement.classList.toggle('dark', val); 
         localStorage.setItem('theme', val ? 'dark' : 'light');
     }); 
     if(localStorage.getItem('theme') === 'dark'){document.documentElement.classList.add('dark');}">
    <button @click="dark = !dark"
        class="px-3 py-2 rounded focus:outline-none transition bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600">
        <span x-show="!dark">🌙 Modo Oscuro</span>
        <span x-show="dark">☀️ Modo Claro</span>
    </button>
</div>
            </div>

            <!-- Mostrar el saldo disponible -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Saldo disponible: €') }}{{ number_format(Auth::user()->saldo_disponible, 2) }}
                </span>
            </div>
            @endauth

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none"
                                aria-label="Abrir menú de usuario">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                @guest
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-nav-link>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-md focus:outline-none focus:ring" aria-label="Menú móvil">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Nuestros productos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('productos.devolver_vista')" :active="request()->routeIs('productos.devolver_vista')">
                {{ __('Devolver Productos') }}
            </x-responsive-nav-link>
            @auth
                <x-responsive-nav-link :href="route('productos.vender')" :active="request()->routeIs('productos.vender')">
                    {{ __('Vender producto') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('productos.mis_compras')" :active="request()->routeIs('productos.mis_compras')">
                    {{ __('Mis Compras') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('movimientos.create')" :active="request()->routeIs('movimientos.create')">
                    {{ __('Movimientos de Saldo') }}
                </x-responsive-nav-link>

                @if(Auth::user()->rol === 'admin')
        <x-responsive-nav-link :href="route('products.create')" :active="request()->routeIs('products.create')">
            {{ __('Añadir producto') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
            {{ __('Backend') }}
        </x-responsive-nav-link>
    @endif
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            @auth
                <div class="px-4">
                    <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth

            @guest
                <div class="px-4">
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            @endguest
        </div>
    </div>
</nav>
