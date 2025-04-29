<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Añadir Reseña para el Producto: ') }} {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Escribe tu reseña sobre este producto.') }}

                    <form method="POST" action="{{ route('reviews.store', $product->id) }}" class="max-w-md mx-auto">
                        @csrf

                        <!-- Reseña -->
                        <div class="mb-4">
                            <label for="review" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tu Reseña</label>
                            <textarea name="review" id="review" rows="4" required
                                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                        </div>

                        <!-- Puntuación -->
                        <div class="mb-4">
                            <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Puntuación (1-5)</label>
                            <select name="rating" id="rating" required
                                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Publicar Reseña
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
