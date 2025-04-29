<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Productos Comprados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">Mis Productos Comprados</h3>

                    @if($purchases->isEmpty())
                        <p class="text-center text-lg text-gray-500">No has comprado ningún producto aún.</p>
                    @else
                        <table class="table-auto w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b">
                                    <th class="px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300">Producto</th>
                                    <th class="px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300">Cantidad</th>
                                    <th class="px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300">Precio</th>
                                    <th class="px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-300">Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $purchase->product->name }}</td>
                                        <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $purchase->quantity }}</td>
                                        <td class="px-4 py-2 text-gray-800 dark:text-gray-100">€{{ number_format($purchase->product->price, 2) }}</td>
                                        <td class="px-4 py-2">
                                            @if($purchase->product->image)
                                                <img src="{{ asset('storage/' . $purchase->product->image) }}" alt="{{ $purchase->product->name }}" class="w-16 h-16 object-cover rounded-md">
                                            @else
                                                <span class="text-gray-500">Sin Imagen</span>
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
