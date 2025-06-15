<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-green-700 dark:text-green-300 tracking-wide uppercase">
            {{ __('Añadir Producto') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-xl sm:rounded-2xl overflow-hidden border border-green-100 dark:border-gray-700">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-6 text-center text-green-600 dark:text-green-300">Complete el formulario para añadir un nuevo producto</h3>

                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Nombre -->
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre del producto</label>
                            <input type="text" name="nombre" id="nombre" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white @error('nombre') border-red-500 @enderror">
                            @error('nombre')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Precio -->
                        <div>
                            <label for="precio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Precio (€)</label>
                            <input type="number" step="0.01" name="precio" id="precio" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white @error('precio') border-red-500 @enderror">
                            @error('precio')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Imagen -->
                        <div>
                            <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Imagen del producto</label>
                            <input type="file" name="imagen" id="imagen" accept="image/*"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white @error('imagen') border-red-500 @enderror">
                            @error('imagen')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div>
                            <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white @error('descripcion') border-red-500 @enderror"></textarea>
                            @error('descripcion')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Estado -->
                        <div>
                            <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estado</label>
                            <select name="estado" id="estado" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white @error('estado') border-red-500 @enderror">
                                <option value="disponible">Disponible</option>
                                <option value="comprado">Comprado</option>
                            </select>
                            @error('estado')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Categoría -->
                        <div>
                            <label for="id_categoria" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Categoría</label>
                            <select name="id_categoria" id="id_categoria" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white @error('id_categoria') border-red-500 @enderror">
                                @foreach ($categoria_producto as $categoria)
                                    <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_categoria')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Botón -->
                        <div class="pt-4 text-center">
                            <button type="submit"
                                class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition shadow">
                                Guardar Producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
