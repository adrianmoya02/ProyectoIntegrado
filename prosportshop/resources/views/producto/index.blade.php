<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-green-700 dark:text-green-300 tracking-wider uppercase">
            {{ __('Lista de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-lg rounded-2xl border border-green-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-2 text-green-700 dark:text-green-300">Catálogo disponible</h3>
                    <p class="mb-6 text-gray-700 dark:text-gray-300">
                        Explora nuestro catálogo de productos. Aquí encontrarás todos los artículos disponibles actualmente en la tienda.
                    </p>
                    @livewire('productos-tabla')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
