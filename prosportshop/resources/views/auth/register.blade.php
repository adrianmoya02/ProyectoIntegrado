<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-b from-green-50 to-white dark:from-gray-900 dark:to-gray-800 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white dark:bg-gray-900 border border-green-200 dark:border-gray-700 p-8 rounded-2xl shadow-lg">
            <h2 class="mt-2 text-center text-2xl font-bold text-green-700 dark:text-green-300 tracking-wider uppercase">
                {{ __('Registrar Usuario') }}
            </h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Nombre -->
                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="nombre" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Primer Apellido -->
                <div>
                    <x-input-label for="primer_apellido" :value="__('Primer Apellido')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="primer_apellido" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="text" name="primer_apellido" :value="old('primer_apellido')" required autocomplete="primer_apellido" />
                    <x-input-error :messages="$errors->get('primer_apellido')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Segundo Apellido -->
                <div>
                    <x-input-label for="segundo_apellido" :value="__('Segundo Apellido')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="segundo_apellido" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="text" name="segundo_apellido" :value="old('segundo_apellido')" autocomplete="segundo_apellido" />
                    <x-input-error :messages="$errors->get('segundo_apellido')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Dirección -->
                <div>
                    <x-input-label for="direccion" :value="__('Dirección')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="direccion" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="text" name="direccion" :value="old('direccion')" autocomplete="direccion" />
                    <x-input-error :messages="$errors->get('direccion')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="email" name="email" :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Contraseña -->
                <div>
                    <x-input-label for="password" :value="__('Contraseña')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Confirmar Contraseña -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Número de Cuenta -->
                <div>
                    <x-input-label for="numero_cuenta" :value="__('Número de Cuenta')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="numero_cuenta" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="text" name="numero_cuenta" :value="old('numero_cuenta')" required autocomplete="numero_cuenta" />
                    <x-input-error :messages="$errors->get('numero_cuenta')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Localidad -->
                <div>
                    <x-input-label for="localidad" :value="__('Localidad')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="localidad" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="text" name="localidad" :value="old('localidad')" required autocomplete="localidad" />
                    <x-input-error :messages="$errors->get('localidad')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Provincia -->
                <div>
                    <x-input-label for="provincia" :value="__('Provincia')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="provincia" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="text" name="provincia" :value="old('provincia')" required autocomplete="provincia" />
                    <x-input-error :messages="$errors->get('provincia')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Código Postal -->
                <div>
                    <x-input-label for="codigo_postal" :value="__('Código Postal')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="codigo_postal" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="text" name="codigo_postal" :value="old('codigo_postal')" required autocomplete="codigo_postal" />
                    <x-input-error :messages="$errors->get('codigo_postal')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Teléfono -->
                <div>
                    <x-input-label for="telefono" :value="__('Teléfono')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="telefono" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="text" name="telefono" :value="old('telefono')" required autocomplete="telefono" />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Fecha de Nacimiento -->
                <div>
                    <x-input-label for="fecha_nacimiento" :value="__('Fecha de Nacimiento')" class="text-green-800 dark:text-green-300" />
                    <x-text-input id="fecha_nacimiento" class="block mt-1 w-full rounded-md shadow-sm border-green-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:ring-green-500 focus:border-green-500" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required autocomplete="fecha_nacimiento" />
                    <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Campos ocultos para rol y estado -->
                <input type="hidden" name="rol" value="user">
                <input type="hidden" name="estado" value="activo">

                <div class="flex items-center justify-end mt-4">
                    <a class="text-sm text-green-700 dark:text-green-300 underline rounded-md hover:text-green-900 dark:hover:text-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('login') }}">
                        {{ __('¿Ya estás registrado?') }}
                    </a>

                    <x-primary-button class="ms-4 bg-green-600 hover:bg-green-700 focus:ring-green-500">
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
