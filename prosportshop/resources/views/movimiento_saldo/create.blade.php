<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-green-700 dark:text-green-300 tracking-wide uppercase">
            {{ __('Registrar Movimiento de Saldo') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-2xl border border-green-200 dark:border-gray-700">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <p class="mb-6 text-sm text-gray-700 dark:text-gray-300">
                        Complete el formulario para registrar un movimiento de saldo en su cuenta.
                    </p>

                    <form method="POST" action="{{ route('movimientos.store') }}" class="max-w-lg mx-auto space-y-6">
                        @csrf

                        <!-- Tipo de Movimiento -->
                        <div>
                            <label for="tipo" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                                Tipo de Movimiento
                            </label>
                            <select name="tipo" id="tipo" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                <option value="ingreso">Ingreso</option>
                                <option value="retiro">Retiro</option>
                            </select>
                            @error('tipo')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Cantidad -->
                        <div>
                            <label for="cantidad" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                                Cantidad
                            </label>
                            <input type="number" name="cantidad" id="cantidad" step="0.01" min="0.01" required
                                value="{{ old('cantidad') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white" />
                            @error('cantidad')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha -->
                        <div>
                            <label for="fecha" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                                Fecha
                            </label>
                            <input type="date" name="fecha" id="fecha" required
                                value="{{ date('Y-m-d') }}"
                                readonly
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-gray-100 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-700 dark:text-white cursor-not-allowed" />
                            @error('fecha')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Método de Pago -->
                        <div>
                            <label for="id_metodo_pago" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                                Método de Pago
                            </label>
                            <div class="flex gap-2">
                                @if($metodosPago->count())
                                    <select name="id_metodo_pago" id="id_metodo_pago" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                        <option value="">Selecciona un método</option>
                                        @foreach($metodosPago as $metodo)
                                            <option value="{{ $metodo->id_metodo_pago }}">{{ $metodo->descripcion ?? $metodo->numero_cuenta }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <span class="text-red-600 text-sm">No tienes métodos de pago registrados.</span>
                                @endif
                                <a href="{{ route('metodos_pago.create') }}"
                                   class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-xs font-semibold">
                                    Añadir método de pago
                                </a>
                            </div>
                            @error('id_metodo_pago')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Botón -->
                        <div class="text-center pt-4">
                            <button type="submit"
                                class="inline-block px-6 py-2 text-white bg-green-600 hover:bg-green-700 rounded-lg font-semibold text-sm shadow transition">
                                Guardar Movimiento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
