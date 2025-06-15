<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-green-700 dark:text-green-300 tracking-wider uppercase">
            {{ __('Devolver Productos') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-lg rounded-2xl border border-green-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-4">Mis Productos Comprados</h3>

                    @if($purchases->isEmpty())
                        <p class="text-center text-lg text-gray-500">No has comprado ningún producto aún.</p>
                    @else
                        <table class="min-w-full divide-y divide-green-200 dark:divide-gray-700">
                            <thead class="bg-green-100 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-green-800 dark:text-green-300 uppercase tracking-wide">Producto</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-green-800 dark:text-green-300 uppercase tracking-wide">Precio</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-green-800 dark:text-green-300 uppercase tracking-wide">Fecha de Compra</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-green-800 dark:text-green-300 uppercase tracking-wide">Imagen</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-green-800 dark:text-green-300 uppercase tracking-wide">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($purchases as $purchase)
                                    <tr class="hover:bg-green-50 dark:hover:bg-gray-800 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $purchase->producto->nombre }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ number_format($purchase->producto->precio, 2) }}€</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                            {{ $purchase->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($purchase->producto->imagen)
                                                <img src="{{ asset('storage/' . $purchase->producto->imagen) }}" alt="{{ $purchase->producto->nombre }}" class="w-16 h-16 object-cover rounded-md">
                                            @else
                                                <span class="text-gray-500">Sin Imagen</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('productos.devolver', $purchase->producto->id_producto) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres devolver este producto?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-800 transition">Devolver</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
