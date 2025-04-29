<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold">Listado de Usuarios</h3>
                    
                    @if(session('success'))
                        <div class="alert alert-success bg-green-500 text-white p-2 rounded-md mt-3">
                            {{ session('success') }}
                        </div>
                    @endif  

                    <a href="{{ route('user.create') }}" class="btn btn-primary mt-3 inline-block bg-blue-500 text-white p-2 rounded-md">Crear Usuario</a>

                    <table class="table mt-3 w-full text-left table-auto">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2 px-4">Nombre</th>
                                <th class="py-2 px-4">Email</th>
                                <th class="py-2 px-4">Rol</th>
                                <th class="py-2 px-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="border-b">
                                <td class="py-2 px-4">{{ $user->name }}</td>
                                <td class="py-2 px-4">{{ $user->email }}</td>
                                <td class="py-2 px-4">{{ $user->role }}</td>
                                <td class="py-2 px-4">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning bg-yellow-500 text-white p-2 rounded-md">Editar</a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger bg-red-500 text-white p-2 rounded-md">Eliminar</button>
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
        // Función para confirmar antes de eliminar
        function confirmDelete() {
            return confirm("¿Estás seguro de que deseas eliminar este usuario?");
        }
    </script>
</x-app-layout>
