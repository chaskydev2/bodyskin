<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PANEL DE CONTROLllllllllllllllll') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Información Personal</h3>
                    <ul class="list-disc pl-5 space-y-2">
                        <li><strong>Nombre Completo:</strong> {{ auth()->user()->name }}</li>
                        <li><strong>Correo Electrónico:</strong> {{ auth()->user()->email }}</li>
                    </ul>
                    
                    <!-- Formulario para añadir datos -->
                    <form method="POST" action="{{ route('user_details.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="nombre_completo" :value="__('Nombre Completo')" />
                                <x-text-input id="nombre_completo" name="nombre_completo" type="text" class="block mt-1 w-full" required />
                            </div>
                            <div>
                                <x-input-label for="edad" :value="__('Edad')" />
                                <x-text-input id="edad" name="edad" type="number" class="block mt-1 w-full" required />
                            </div>
                            <div>
                                <x-input-label for="peso" :value="__('Peso')" />
                                <x-text-input id="peso" name="peso" type="text" class="block mt-1 w-full" required />
                            </div>
                            <div>
                                <x-input-label for="talla" :value="__('Talla')" />
                                <x-text-input id="talla" name="talla" type="text" class="block mt-1 w-full" required />
                            </div>
                            <div>
                                <x-input-label for="membresia" :value="__('Membresía')" />
                                <x-text-input id="membresia" name="membresia" type="text" class="block mt-1 w-full" required />
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <x-primary-button>
                                {{ __('Guardar Datos') }}
                            </x-primary-button>
                            <x-primary-button onclick="document.getElementById('edit-section').classList.toggle('hidden')" class="ml-3">
                                {{ __('Modificar Datos') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Sección para modificar datos -->
                    <div id="edit-section" class="hidden mt-8">
                        <h3 class="text-lg font-bold mb-4">Modificar Datos</h3>
                        <form method="POST" action="{{ route('user_details.update', $userDetails->first()->id ?? '') }}">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="nombre_completo_edit" :value="__('Nombre Completo')" />
                                    <x-text-input id="nombre_completo_edit" name="nombre_completo" type="text" class="block mt-1 w-full" value="{{ $userDetails->first()->nombre_completo ?? '' }}" required />
                                </div>
                                <div>
                                    <x-input-label for="edad_edit" :value="__('Edad')" />
                                    <x-text-input id="edad_edit" name="edad" type="number" class="block mt-1 w-full" value="{{ $userDetails->first()->edad ?? '' }}" required />
                                </div>
                                <div>
                                    <x-input-label for="peso_edit" :value="__('Peso')" />
                                    <x-text-input id="peso_edit" name="peso" type="text" class="block mt-1 w-full" value="{{ $userDetails->first()->peso ?? '' }}" required />
                                </div>
                                <div>
                                    <x-input-label for="talla_edit" :value="__('Talla')" />
                                    <x-text-input id="talla_edit" name="talla" type="text" class="block mt-1 w-full" value="{{ $userDetails->first()->talla ?? '' }}" required />
                                </div>
                                <div>
                                    <x-input-label for="membresia_edit" :value="__('Membresía')" />
                                    <x-text-input id="membresia_edit" name="membresia" type="text" class="block mt-1 w-full" value="{{ $userDetails->first()->membresia ?? '' }}" required />
                                </div>
                            </div>
                            <div class="flex justify-end mt-4">
                                <x-primary-button>
                                    {{ __('Actualizar') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>

                    <!-- Tabla para mostrar datos -->
                    <h3 class="text-lg font-bold mt-8 mb-4">Datos Registrados</h3>
                    <table class="table-auto w-full text-left">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nombre Completo</th>
                                <th class="px-4 py-2">Edad</th>
                                <th class="px-4 py-2">Peso</th>
                                <th class="px-4 py-2">Talla</th>
                                <th class="px-4 py-2">Membresía</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($userDetails as $detail)
                                <tr>
                                    <td class="border px-4 py-2">{{ $detail->nombre_completo }}</td>
                                    <td class="border px-4 py-2">{{ $detail->edad }}</td>
                                    <td class="border px-4 py-2">{{ $detail->peso }}</td>
                                    <td class="border px-4 py-2">{{ $detail->talla }}</td>
                                    <td class="border px-4 py-2">{{ $detail->membresia }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border px-4 py-2 text-center">No hay datos registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
