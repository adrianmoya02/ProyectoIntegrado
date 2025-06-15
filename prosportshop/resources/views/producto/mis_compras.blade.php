<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-green-700 dark:text-green-300 tracking-wider uppercase">
            {{ __('Mis Compras') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg rounded-2xl border border-green-200 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($compras->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400 italic">No has realizado ninguna compra.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-green-100 dark:bg-green-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">
                                        Producto
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">
                                        Precio
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">
                                        Fecha de Compra
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-green-800 dark:text-green-100 uppercase tracking-wider">
                                        Reseña
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($compras as $compra)
                                    <tr class="hover:bg-green-50 dark:hover:bg-gray-700 transition">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $compra->producto->nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            €{{ number_format($compra->producto->precio, 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $compra->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-800 dark:text-gray-200">
                                            @if ($compra->comentario)
                                                <div class="space-y-1">
                                                    <p><span class="font-semibold text-green-700 dark:text-green-300">Valoración:</span> {{ $compra->valoracion }} / 5</p>
                                                    <p class="italic text-gray-600 dark:text-gray-400">“{{ $compra->comentario }}”</p>
                                                </div>
                                            @else
                                                <p class="text-gray-500 dark:text-gray-400 italic">No has dejado una reseña.</p>
                                            @endif
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
