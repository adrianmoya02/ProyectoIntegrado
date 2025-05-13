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
                    <h3 class="text-lg font-bold">{{ $producto->nombre }}</h3>
                    <p><strong>Precio:</strong> €{{ number_format($producto->precio, 2) }}</p>
                    <p><strong>Estado:</strong> {{ $producto->estado }}</p>
                    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                    @if ($producto->imagen)
<img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="mt-4 w-64 h-64 object-cover">                    @endif

                    <!-- Mostrar mensajes de éxito o error -->
                    @if (session('success'))
                        <p class="mt-4 text-green-500 font-bold">{{ session('success') }}</p>
                    @endif

                    @if (session('error'))
                        <p class="mt-4 text-red-500 font-bold">{{ session('error') }}</p>
                        <a href="{{ route('movimientos.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                            Ir a Movimientos de Saldo
                        </a>
                    @endif

                    <!-- Botón de compra -->
                    @if ($producto->estado === 'disponible' && !session('error'))
                        <form action="{{ route('productos.comprar', $producto->id_producto) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">
                                Comprar
                            </button>
                        </form>
                    @elseif ($producto->estado !== 'disponible')
                        <p class="mt-4 text-red-500 font-bold">Este producto ya no está disponible.</p>
                    @endif

                    <!-- Botón de devolución -->
                    @if ($producto->compras->where('id_usuario', auth()->id())->isNotEmpty())
                        <form action="{{ route('productos.devolver', $producto->id_producto) }}" method="POST" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">
                                Devolver
                            </button>
                        </form>
                    @endif

                    <!-- Sección de reseñas -->
                    <div class="mt-8">
                        <h4 class="text-lg font-bold">Reseñas</h4>

                        <!-- Mostrar reseñas existentes -->
                        @foreach ($producto->compras as $compra)
                            @if ($compra->comentario)
                                <div class="mt-4 p-4 border rounded dark:border-gray-700">
                                    <p><strong>{{ $compra->usuario->nombre }}</strong> dice:</p>
                                    <p>{{ $compra->comentario }}</p>
                                    <p class="text-sm text-gray-500">Valoración: {{ $compra->valoracion }} / 5</p>
                                    <p class="text-sm text-gray-500">Publicado el {{ $compra->updated_at->format('d/m/Y') }}</p>
                                </div>
                            @endif
                        @endforeach

                        <!-- Formulario para agregar una reseña -->
                        @if ($producto->compras->where('id_usuario', auth()->id())->isNotEmpty())
                            <form action="{{ route('productos.reseñas.store', $producto->id_producto) }}" method="POST" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label for="comentario" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Escribe tu reseña:</label>
                                    <textarea id="comentario" name="comentario" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-gray-100"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="valoracion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valoración (1-5):</label>
                                    <input type="number" id="valoracion" name="valoracion" min="1" max="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-gray-100">
                                </div>
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Enviar reseña</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
