<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block w-full mt-1" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Primer Apellido -->
        <div>
            <x-input-label for="primer_apellido" :value="__('Primer Apellido')" />
            <x-text-input id="primer_apellido" class="block w-full mt-1" type="text" name="primer_apellido" :value="old('primer_apellido')" required autocomplete="primer_apellido" />
            <x-input-error :messages="$errors->get('primer_apellido')" class="mt-2" />
        </div>

        <!-- Segundo Apellido -->
        <div>
            <x-input-label for="segundo_apellido" :value="__('Segundo Apellido')" />
            <x-text-input id="segundo_apellido" class="block w-full mt-1" type="text" name="segundo_apellido" :value="old('segundo_apellido')" autocomplete="segundo_apellido" />
            <x-input-error :messages="$errors->get('segundo_apellido')" class="mt-2" />
        </div>

        <!-- Dirección -->
        <div>
            <x-input-label for="direccion" :value="__('Dirección')" />
            <x-text-input id="direccion" class="block w-full mt-1" type="text" name="direccion" :value="old('direccion')" autocomplete="direccion" />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="contrasena" :value="__('Contraseña')" />
            <x-text-input id="contrasena" class="block w-full mt-1" type="password" name="contrasena" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('contrasena')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="contrasena_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="contrasena_confirmation" class="block w-full mt-1" type="password" name="contrasena_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('contrasena_confirmation')" class="mt-2" />
        </div>

        <!-- Número de Cuenta -->
        <div>
            <x-input-label for="numero_cuenta" :value="__('Número de Cuenta')" />
            <x-text-input id="numero_cuenta" class="block w-full mt-1" type="text" name="numero_cuenta" :value="old('numero_cuenta')" required autocomplete="numero_cuenta" />
            <x-input-error :messages="$errors->get('numero_cuenta')" class="mt-2" />
        </div>

        <!-- Rol -->
        <div>
            <x-input-label for="rol" :value="__('Rol')" />
            <x-text-input id="rol" class="block w-full mt-1" type="text" name="rol" :value="old('rol')" required autocomplete="rol" />
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <!-- Localidad -->
        <div>
            <x-input-label for="localidad" :value="__('Localidad')" />
            <x-text-input id="localidad" class="block w-full mt-1" type="text" name="localidad" :value="old('localidad')" required autocomplete="localidad" />
            <x-input-error :messages="$errors->get('localidad')" class="mt-2" />
        </div>

        <!-- Provincia -->
        <div>
            <x-input-label for="provincia" :value="__('Provincia')" />
            <x-text-input id="provincia" class="block w-full mt-1" type="text" name="provincia" :value="old('provincia')" required autocomplete="provincia" />
            <x-input-error :messages="$errors->get('provincia')" class="mt-2" />
        </div>

        <!-- Código Postal -->
        <div>
            <x-input-label for="codigo_postal" :value="__('Código Postal')" />
            <x-text-input id="codigo_postal" class="block w-full mt-1" type="text" name="codigo_postal" :value="old('codigo_postal')" required autocomplete="codigo_postal" />
            <x-input-error :messages="$errors->get('codigo_postal')" class="mt-2" />
        </div>

        <!-- Teléfono -->
        <div>
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="block w-full mt-1" type="text" name="telefono" :value="old('telefono')" required autocomplete="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Fecha de Nacimiento -->
        <div>
            <x-input-label for="fecha_nacimiento" :value="__('Fecha de Nacimiento')" />
            <x-text-input id="fecha_nacimiento" class="block w-full mt-1" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required autocomplete="fecha_nacimiento" />
            <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
        </div>

        <!-- Estado -->
        <div>
            <x-input-label for="estado" :value="__('Estado')" />
            <x-text-input id="estado" class="block w-full mt-1" type="text" name="estado" :value="old('estado')" required autocomplete="estado" />
            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
