<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold">Editar Usuario</h3>
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mt-4">
                            <label for="dni" class="block text-lg font-medium text-gray-700 dark:text-gray-300">DNI</label>
                            <input type="text" id="dni" name="dni" value="{{ old('dni', $user->dni) }}"
                                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm
                                @error('dni') border-red-500 @else border-gray-300 @enderror
                                focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            @error('dni')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="name" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm
                                @error('name') border-red-500 @else border-gray-300 @enderror
                                focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="apell" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Apellido</label>
                            <input type="text" id="apell" name="apell" value="{{ old('apell', $user->apell) }}"
                                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm
                                @error('apell') border-red-500 @else border-gray-300 @enderror
                                focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            @error('apell')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="direccion" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Dirección</label>
                            <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $user->direccion) }}"
                                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm
                                @error('direccion') border-red-500 @else border-gray-300 @enderror
                                focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            @error('direccion')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Correo Electrónico</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm
                                @error('email') border-red-500 @else border-gray-300 @enderror
                                focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="password" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
                            <input type="password" id="password" name="password"
                                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm
                                @error('password') border-red-500 @else border-gray-300 @enderror
                                focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="password_confirmation" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Confirmar Contraseña</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div class="mt-4">
                            <label for="role" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Rol</label>
                            <select id="role" name="role"
                                class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm
                                @error('role') border-red-500 @else border-gray-300 @enderror
                                focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white" required>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>Usuario</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrador</option>
                            </select>
                            @error('role')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                Actualizar Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>