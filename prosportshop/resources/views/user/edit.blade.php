<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-green-700 dark:text-green-300 tracking-wider uppercase">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg rounded-2xl border border-green-200 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-4">Editar Usuario</h3>
                    <form action="{{ route('user.update', $user->id_usuario) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="nombre" class="block font-semibold">Nombre</label>
                                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $user->nombre) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"
                                    required>
                                @error('nombre')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="primer_apellido" class="block font-semibold">Primer Apellido</label>
                                <input type="text" id="primer_apellido" name="primer_apellido"
                                    value="{{ old('primer_apellido', $user->primer_apellido) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                                @error('primer_apellido')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="segundo_apellido" class="block font-semibold">Segundo Apellido</label>
                                <input type="text" id="segundo_apellido" name="segundo_apellido"
                                    value="{{ old('segundo_apellido', $user->segundo_apellido) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                                @error('segundo_apellido')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="direccion" class="block font-semibold">Dirección</label>
                                <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $user->direccion) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                                @error('direccion')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block font-semibold">Correo Electrónico</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white"
                                    required>
                                @error('email')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="numero_cuenta" class="block font-semibold">Número de Cuenta</label>
                                <input type="text" id="numero_cuenta" name="numero_cuenta"
                                    value="{{ old('numero_cuenta', $user->numero_cuenta) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                                @error('numero_cuenta')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="localidad" class="block font-semibold">Localidad</label>
                                <input type="text" id="localidad" name="localidad" value="{{ old('localidad', $user->localidad) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                                @error('localidad')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="provincia" class="block font-semibold">Provincia</label>
                                <input type="text" id="provincia" name="provincia" value="{{ old('provincia', $user->provincia) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                                @error('provincia')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="codigo_postal" class="block font-semibold">Código Postal</label>
                                <input type="text" id="codigo_postal" name="codigo_postal"
                                    value="{{ old('codigo_postal', $user->codigo_postal) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                                @error('codigo_postal')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="telefono" class="block font-semibold">Teléfono</label>
                                <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $user->telefono) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                                @error('telefono')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="fecha_nacimiento" class="block font-semibold">Fecha de Nacimiento</label>
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                    value="{{ old('fecha_nacimiento', $user->fecha_nacimiento ? $user->fecha_nacimiento->format('Y-m-d') : '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                                @error('fecha_nacimiento')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="rol" class="block font-semibold">Rol</label>
                                <select id="rol" name="rol"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                                    <option value="user" {{ old('rol', $user->rol) == 'user' ? 'selected' : '' }}>Usuario
                                    </option>
                                    <option value="admin" {{ old('rol', $user->rol) == 'admin' ? 'selected' : '' }}>Administrador
                                    </option>
                                </select>
                                @error('rol')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="estado" class="block font-semibold">Estado</label>
                                <select id="estado" name="estado"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                                    <option value="activo" {{ old('estado', $user->estado) == 'activo' ? 'selected' : '' }}>
                                        Activo</option>
                                    <option value="inactivo" {{ old('estado', $user->estado) == 'inactivo' ? 'selected' : '' }}>
                                        Inactivo</option>
                                </select>
                                @error('estado')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="password" class="block font-semibold">Contraseña</label>
                            <input type="password" id="password" name="password"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                            @error('password')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="password_confirmation" class="block font-semibold">Confirmar Contraseña</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">
                            @error('password_confirmation')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                Actualizar Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>