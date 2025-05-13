<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold">Editar Producto</h3>

                    <form action="{{ route('productos.update', $product->id_producto) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Método PUT para actualizar -->

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $product->nombre) }}" required
                                class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white @error('nombre') border-red-500 @enderror">
                            @error('nombre')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Precio -->
                        <div class="mb-4">
                            <label for="precio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio (€)</label>
                            <input type="number" step="0.01" id="precio" name="precio" value="{{ old('precio', $product->precio) }}" required
                                class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white @error('precio') border-red-500 @enderror">
                            @error('precio')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Imagen -->
                        <div class="mb-4">
                            <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen</label>
                            <input type="file" id="imagen" name="imagen"
                                class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white @error('imagen') border-red-500 @enderror">
                            @if($product->imagen)
                                <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" class="w-32 h-32 object-cover mt-2">
                            @endif
                            @error('imagen')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                            <textarea id="descripcion" name="descripcion" rows="4"
                                class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white @error('descripcion') border-red-500 @enderror">{{ old('descripcion', $product->descripcion) }}</textarea>
                            @error('descripcion')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado</label>
                            <select id="estado" name="estado" required
                                class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white @error('estado') border-red-500 @enderror">
                                <option value="disponible" {{ old('estado', $product->estado) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                <option value="no_disponible" {{ old('estado', $product->estado) == 'no_disponible' ? 'selected' : '' }}>No disponible</option>
                            </select>
                            @error('estado')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Categoría -->
                        <div class="mb-4">
                            <label for="id_categoria" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoría</label>
                            <select id="id_categoria" name="id_categoria" required
                                class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white @error('id_categoria') border-red-500 @enderror">
                                @foreach ($categoria_producto as $categoria)
                                    <option value="{{ $categoria->id_categoria }}" {{ old('id_categoria', $product->id_categoria) == $categoria->id_categoria ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_categoria')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex space-x-2">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">Actualizar</button>
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
