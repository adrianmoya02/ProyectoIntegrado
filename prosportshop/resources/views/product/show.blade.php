<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Detalles del Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold">{{ $product->name }}</h3>
                    <p class="mt-2">Cantidad disponible: {{ $product->quantity }}</p>
                    <p class="mt-2">Precio: €{{ number_format($product->price, 2) }}</p>

                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-64 h-64 object-cover mt-4">
                    @endif

                    <div class="mt-4 space-x-2">
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('products.edit', $product->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-700">
                                    Editar
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">
                                        Eliminar
                                    </button>
                                </form>
                            @endif

                            @if($product->quantity > 0)
                                <form action="{{ route('products.buy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    <label for="quantity" class="mr-2">Cantidad:</label>
                                    <input type="number" name="quantity" id="quantity" min="1" max="{{ $product->quantity }}" value="1" class="text-black px-3 py-2 border rounded-md">
                                    
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">
                                        Comprar
                                    </button>
                                </form>
                            @else
                                <button class="px-4 py-2 bg-gray-500 text-white rounded cursor-not-allowed" disabled>
                                    Sin Stock
                                </button>
                            @endif
                        @else
                            <button class="px-4 py-2 bg-gray-500 text-white rounded cursor-not-allowed" disabled>
                                Comprar (Inicia sesión)
                            </button>
                        @endauth
                    </div>

                    <a href="{{ route('product.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 mt-4 inline-block">
                        Volver a la tienda
                    </a>

                    <!-- Reseñas -->
                    <div class="mt-8">
                        <h4 class="text-xl font-semibold">Reseñas:</h4>

                        @foreach($product->reviews as $review)
                            <div class="mt-4 border-b border-gray-200 pb-4">
                                <p><strong>{{ $review->user->name }}</strong> (Puntuación: {{ $review->rating }})</p>
                                <p>{{ $review->review }}</p>
                            </div>
                        @endforeach

                        @auth
                            <button id="toggleReviewForm" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                                Escribir una reseña
                            </button>

                            <div id="reviewForm" class="mt-6 hidden">
                                <h5 class="text-lg font-medium">Deja una reseña:</h5>
                                <form action="{{ route('reviews.store', $product->id) }}" method="POST">
                                    @csrf

                                    <!-- Reseña -->
                                    <div class="mb-4">
                                        <label for="review" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tu Reseña</label>
                                        <textarea name="review" id="review" rows="4" required
                                            class="w-full mt-1 px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('review') border-red-500 @enderror">{{ old('review') }}</textarea>
                                        @error('review')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Puntuación -->
                                    <div class="mb-4">
                                        <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Puntuación (1-5)</label>
                                        <select name="rating" id="rating" required
                                            class="w-full mt-1 px-3 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('rating') border-red-500 @enderror">
                                            <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                        @error('rating')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="submit"
                                        class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                        Publicar Reseña
                                    </button>
                                </form>
                            </div>
                        @else
                            <p class="mt-4">Inicia sesión para dejar una reseña.</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleReviewForm').addEventListener('click', function () {
            const reviewForm = document.getElementById('reviewForm');
            reviewForm.classList.toggle('hidden');
        });
    </script>
</x-app-layout>
