<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-green-700 dark:text-green-300 tracking-wider uppercase">
            {{ __('Vender un Producto') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg rounded-2xl border border-green-200 dark:border-gray-700 p-8">
                @if(session('success'))
                    <div class="mb-4 text-green-700 bg-green-100 p-2 rounded">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('productos.vender.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="nombre" :value="__('Nombre del producto')" />
                        <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" required autofocus />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="descripcion" :value="__('Descripción')" />
                        <textarea id="descripcion" name="descripcion" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100" required></textarea>
                        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="precio_usuario" :value="__('Precio que quieres recibir (€)')" />
                        <x-text-input id="precio_usuario" name="precio_usuario" type="number" step="0.01" min="0" class="mt-1 block w-full" required />
                        <x-input-error :messages="$errors->get('precio_usuario')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="categoria" :value="__('Categoría')" />
                        <select id="categoria" name="categoria" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100" required>
                            <option value="">Selecciona una categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="imagen" :value="__('Imagen')" />
                        <input id="imagen" name="imagen" type="file" class="mt-1 block w-full" accept="image/*" required>
                        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                    </div>

                    <x-primary-button class="w-full justify-center">
                        {{ __('Poner a la venta') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>