<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PANEL DE CONTROL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Mensajes de sesión -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Información Personal</h3>
                    <ul class="list-disc pl-5 space-y-2">
                        <li><strong>Nombre Completo:</strong> {{ auth()->user()->name }}</li>
                        <li><strong>Correo Electrónico:</strong> {{ auth()->user()->email }}</li>
                    </ul>

                    <!-- Botón Plan -->
                    <div class="mt-4">
                        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openModal()">
                            Plan
                        </button>
                    </div>

                    <!-- Modal -->
                    <div id="welcomeModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full flex items-center justify-center z-50">
                        <div class="relative mx-auto p-8 w-full max-w-8xl shadow-2xl rounded-xl bg-white">
                            <div class="text-center">
                                <h3 class="text-4xl font-bold text-gray-900 mb-8">Welcome</h3>

                                <!-- Planes de Gimnasio -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                    <!-- Plan Diario -->
                                    <div class="bg-white p-8 rounded-xl shadow-lg border-4 border-blue-500 transform hover:scale-105 transition-transform duration-300">
                                        <h4 class="text-3xl font-bold text-blue-600 mb-3">Plan Diario</h4>
                                        <div class="text-6xl font-bold mb-3">$10<span class="text-2xl">/día</span></div>
                                        <div class="text-center mb-4">
                                            <span class="text-3xl font-bold text-blue-600">HOURS</span>
                                        </div>
                                        <ul class="text-left space-y-3 mb-6">
                                            <li class="flex items-center">
                                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-base">Sin compromiso</span>
                                            </li>
                                            <li class="flex items-center">
                                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-base">Acceso a todas las instalaciones</span>
                                            </li>
                                        </ul>
                                        <button class="w-full bg-blue-500 text-white py-4 px-8 rounded-lg hover:bg-blue-600 transition-colors duration-300 text-xl font-bold shadow-lg" onclick="window.location.href='/payment/checkout?plan=diario&price=10'">
                                            Seleccionar Plan
                                        </button>
                                    </div>

                                    <!-- Plan Semanal -->
                                    <div class="bg-white p-8 rounded-xl shadow-2xl border-4 border-blue-500 transform hover:scale-105 transition-transform duration-300 scale-105 z-10">
                                        
                                        <h4 class="text-3xl font-bold text-blue-600 mb-3 mt-2">Plan Semanal</h4>
                                        <div class="text-6xl font-bold mb-3">$50<span class="text-2xl">/semana</span></div>
                                        <div class="text-center mb-4">
                                            <span class="text-3xl font-bold text-blue-600">1 WEEK</span>
                                        </div>
                                        <ul class="text-left space-y-3 mb-6">
                                            <li class="flex items-center">
                                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-base">Ahorro del 30%</span>
                                            </li>
                                            <li class="flex items-center">
                                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-base">Plan dietético</span>
                                            </li>
                                        </ul>
                                        <button class="w-full bg-blue-500 text-white py-4 px-8 rounded-lg hover:bg-blue-600 transition-colors duration-300 text-xl font-bold shadow-lg" onclick="window.location.href='/payment/checkout?plan=semanal&price=50'">
                                            Seleccionar Plan
                                        </button>
                                    </div>

                                    <!-- Plan Mensual -->
                                    <div class="bg-white p-8 rounded-xl shadow-lg border-4 border-blue-500 transform hover:scale-105 transition-transform duration-300">
                                        <h4 class="text-3xl font-bold text-blue-600 mb-3">Plan Mensual</h4>
                                        <div class="text-6xl font-bold mb-3">$150<span class="text-2xl">/mes</span></div>
                                        <div class="text-center mb-4">
                                            <span class="text-3xl font-bold text-blue-600">1 MONTH</span>
                                        </div>
                                        <ul class="text-left space-y-3 mb-6">
                                            <li class="flex items-center">
                                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-base">Ahorro del 50%</span>
                                            </li>
                                            <li class="flex items-center">
                                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-base">Todos los beneficios incluidos</span>
                                            </li>
                                        </ul>
                                        <button class="w-full bg-blue-500 text-white py-4 px-8 rounded-lg hover:bg-blue-600 transition-colors duration-300 text-xl font-bold shadow-lg" onclick="window.location.href='/payment/checkout?plan=mensual&price=150'">
                                            Seleccionar Plan
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <button id="closeModal" class="px-8 py-3 bg-blue-500 text-white text-lg font-medium rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300" onclick="closeModal()">
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

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

    <script>
        function openModal() {
            document.getElementById('welcomeModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('welcomeModal').classList.add('hidden');
        }

        // Cerrar el modal si se hace clic fuera de él
        document.getElementById('welcomeModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</x-app-layout>
