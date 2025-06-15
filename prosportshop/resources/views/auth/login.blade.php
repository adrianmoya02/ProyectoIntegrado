<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-b from-green-50 to-white dark:from-gray-900 dark:to-gray-800 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white dark:bg-gray-900 border border-green-200 dark:border-gray-700 p-8 rounded-2xl shadow-lg">
            <!-- Logo de la tienda -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('storage/logo.jpg') }}" alt="Logo de la tienda" class="block w-auto h-16" />
            </div>
            <h2 class="mt-2 text-center text-2xl font-bold text-green-700 dark:text-green-300 tracking-wider uppercase">
                {{ __('Iniciar Sesión') }}
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Correo Electrónico')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Contraseña')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-green-300 dark:border-gray-700 text-green-600 dark:bg-gray-800 focus:ring-green-500 dark:focus:ring-offset-gray-800" name="remember">
                    <label for="remember_me" class="ms-2 text-sm text-gray-700 dark:text-gray-300">
                        {{ __('Recordarme') }}
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-green-700 dark:text-green-300 hover:underline" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif

                    <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500">
                        {{ __('Iniciar Sesión') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('register') }}"
                   class="inline-block px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition font-semibold">
                    ¿No tienes cuenta? Regístrate
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
