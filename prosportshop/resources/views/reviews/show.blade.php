<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold">{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>

                    <!-- Mostrar reseñas -->
                    <h4 class="mt-4 text-xl font-medium">Reseñas del Producto:</h4>
                    @if($product->reviews->isEmpty())
                        <p>No hay reseñas para este producto todavía.</p>
                    @else
                        @foreach($product->reviews as $review)
                            <div class="mt-4 border-b border-gray-200 pb-4">
                                <p><strong>{{ $review->user->name }}</strong> (Puntuación: {{ $review->rating }})</p>
                                <p>{{ $review->review }}</p>
                            </div>
                        @endforeach
                    @endif

                    <!-- Enlace para agregar una reseña -->
                    @auth
                        <div class="mt-6">
                            <a href="{{ route('reviews.create', $product->id) }}"
                               class="text-blue-600 hover:text-blue-800">
                               Agregar una reseña
                            </a>
                        </div>
                    @else
                        <p class="mt-4">Inicia sesión para dejar una reseña.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
