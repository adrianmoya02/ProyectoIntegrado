<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-green-700 dark:text-green-300 tracking-wider uppercase">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg rounded-2xl border border-green-200 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-4">Listado de Usuarios</h3>
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-2 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{ route('user.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Crear Usuario</a>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-green-100 dark:bg-green-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Primer Apellido</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Segundo Apellido</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Rol</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($users as $user)
                            <tr class="hover:bg-green-50 dark:hover:bg-gray-700 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $user->nombre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $user->primer_apellido }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $user->segundo_apellido }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $user->rol }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ ucfirst($user->estado) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('user.edit', $user->id_usuario) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md mr-2">Editar</a>
                                    <form action="{{ route('user.destroy', $user->id_usuario) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            return confirm("¿Estás seguro de que deseas eliminar este usuario?");
        }
    </script>
</x-app-layout>
