<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Página no encontrada') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center">
                        <h1 class="text-4xl font-bold text-red-600 mb-4">¡Oops!</h1>
                        <p class="text-lg text-gray-700 dark:text-gray-300">
                            Lo sentimos, no podemos encontrar la página que buscas. 
                            La página podría haber sido eliminada, o la URL podría estar equivocada.
                        </p>
                        <p class="text-lg text-gray-700 dark:text-gray-300 mt-4">
                            <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-700">
                                Regresar al inicio
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
