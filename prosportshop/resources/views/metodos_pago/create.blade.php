<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-green-700 dark:text-green-300 tracking-wide uppercase">
            {{ __('Añadir Método de Pago') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-50 to-white dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-2xl border border-green-200 dark:border-gray-700">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('metodos_pago.store') }}" class="max-w-lg mx-auto space-y-6">
                        @csrf

                        <div>
                            <label for="numero_cuenta" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                                Número de Cuenta
                            </label>
                            <input type="text" name="numero_cuenta" id="numero_cuenta" 
                                value="{{ Auth::user()->numero_cuenta }}" 
                                readonly
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm bg-gray-100 dark:bg-gray-700 dark:border-gray-700 dark:text-white cursor-not-allowed" />
                            @error('numero_cuenta')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="titular" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                                Titular
                            </label>
                            <input type="text" name="titular" id="titular" required
                                value="{{ old('titular') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white" />
                            @error('titular')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="entidad_bancaria" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                                Entidad Bancaria
                            </label>
                            <input type="text" name="entidad_bancaria" id="entidad_bancaria" required
                                value="{{ old('entidad_bancaria') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white" />
                            @error('entidad_bancaria')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="descripcion" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">
                                Descripción (opcional)
                            </label>
                            <input type="text" name="descripcion" id="descripcion"
                                value="{{ old('descripcion') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white" />
                            @error('descripcion')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="text-center pt-4">
                            <button type="submit"
                                class="inline-block px-6 py-2 text-white bg-green-600 hover:bg-green-700 rounded-lg font-semibold text-sm shadow transition">
                                Guardar Método de Pago
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>