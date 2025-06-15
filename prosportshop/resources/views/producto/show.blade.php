<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-green-700 dark:text-green-300 tracking-wider uppercase">
            {{ __('Detalles del Producto') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg rounded-2xl border border-green-200 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    <h3 class="text-xl font-bold text-green-800 dark:text-green-300">{{ $producto->nombre }}</h3>
                    <p><strong>Precio:</strong> €{{ number_format($producto->precio, 2) }}</p>
                    <p><strong>Estado:</strong> 
                        <span class="inline-block px-2 py-1 text-sm font-semibold rounded-full 
                            {{ $producto->estado === 'disponible' ? 'bg-green-200 text-green-800 dark:bg-green-700 dark:text-green-100' : 'bg-red-200 text-red-800 dark:bg-red-700 dark:text-red-100' }}">
                            {{ ucfirst($producto->estado) }}
                        </span>
                    </p>
                    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>

                    @if ($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="mt-4 w-64 h-64 object-cover rounded-xl shadow-md">
                    @endif

                    @if (session('success'))
                        <p class="mt-4 text-green-600 font-semibold bg-green-100 px-4 py-2 rounded-md">{{ session('success') }}</p>
                    @endif

                    @if (session('error'))
                        <div class="mt-4 bg-red-100 p-4 rounded-md">
                            <p class="text-red-600 font-semibold">{{ session('error') }}</p>
                            <a href="{{ route('movimientos.create') }}" class="inline-block mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 transition">Ir a Movimientos de Saldo</a>
                        </div>
                    @endif

                    @if ($producto->estado === 'disponible' && !session('error'))
                        <form action="{{ route('productos.comprar', $producto->id_producto) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700 transition">Comprar</button>
                        </form>
                    @elseif ($producto->estado !== 'disponible')
                        <p class="mt-4 text-red-500 font-bold">Este producto ya no está disponible.</p>
                    @endif

                    {{-- Elimina este bloque para quitar la opción de devolver producto --}}
                    {{-- 
                    @if ($producto->compras->where('id_usuario', auth()->id())->isNotEmpty())
                        <form action="{{ route('productos.devolver', $producto->id_producto) }}" method="POST" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 transition">Devolver</button>
                        </form>
                    @endif 
                    --}}

                    <div class="mt-8">
                        <h4 class="text-lg font-bold text-green-800 dark:text-green-300">Reseñas</h4>

                        @foreach ($producto->compras as $compra)
                            @if ($compra->comentario)
                                <div class="mt-4 p-4 border rounded-md dark:border-gray-700 bg-green-50 dark:bg-gray-800">
                                    <p class="font-semibold text-green-900 dark:text-green-200">{{ $compra->usuario->nombre }} dice:</p>
                                    <p class="text-gray-800 dark:text-gray-200">{{ $compra->comentario }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Valoración: {{ $compra->valoracion }} / 5</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Publicado el {{ $compra->updated_at->format('d/m/Y') }}</p>
                                </div>
                            @endif
                        @endforeach

                        @if ($producto->compras->where('id_usuario', auth()->id())->isNotEmpty())
                            <form action="{{ route('productos.reseñas.store', $producto->id_producto) }}" method="POST" class="mt-6 space-y-4">
                                @csrf
                                <div>
                                    <label for="comentario" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Escribe tu reseña:</label>
                                    <textarea id="comentario" name="comentario" rows="4" class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm dark:bg-gray-800 dark:text-gray-100"></textarea>
                                </div>
                                <div>
                                    <label for="valoracion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valoración (1-5):</label>
                                    <input type="number" id="valoracion" name="valoracion" min="1" max="5" class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm dark:bg-gray-800 dark:text-gray-100">
                                </div>
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 transition">Enviar reseña</button>
                            </form>
                        @endif
                    </div>

                    {{-- Botón Volver --}}
                    <a href="{{ route('products.index') }}" class="inline-block mt-8 px-6 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
