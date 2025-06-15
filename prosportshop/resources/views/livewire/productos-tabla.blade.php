<div>
    <!-- Buscador y filtro -->
    <div class="mb-6 flex flex-col md:flex-row md:items-center gap-4">
        <input type="text" wire:model.live="buscar" placeholder="Buscar por nombre"
            class="px-4 py-2 border border-green-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 text-black dark:bg-gray-800 dark:border-gray-700 dark:text-white" />
        <select wire:model.live="categoria"
            class="px-4 py-2 border border-green-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 text-black dark:bg-gray-800 dark:border-gray-700 dark:text-white">
            <option value="">Todas las categorías</option>
            @foreach($categorias as $cat)
                <option value="{{ $cat->id_categoria }}">{{ $cat->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg rounded-2xl border border-green-200 dark:border-gray-700">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h3 class="text-xl font-bold mb-4 text-green-700 dark:text-green-300">Catálogo de Productos</h3>
            
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-green-100 dark:bg-green-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Imagen</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Precio</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Categoría</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($productos as $producto)
                        <tr class="hover:bg-green-50 dark:hover:bg-gray-700 transition">
                            <td class="px-6 py-4">
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" class="w-16 max-w-full max-h-full md:w-32 rounded" alt="{{ $producto->nombre }}">
                                @else
                                    <span class="text-gray-400">Sin imagen</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $producto->nombre }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ number_format($producto->precio, 2) }} €
                            </td>
                            <td class="px-6 py-4">
                                {{ $producto->categoria->nombre ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ ucfirst($producto->estado) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <a href="{{ route('productos.show', $producto->id_producto) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md mr-2">Detalles</a>
                                @if(Auth::check() && Auth::user()->rol === 'admin')
                                    <a href="{{ route('productos.edit', $producto->id_producto) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md mr-2">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">Eliminar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-2 px-4 text-center">No hay productos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-6">
                {{ $productos->links() }}
            </div>
        </div>
    </div>
</div>

