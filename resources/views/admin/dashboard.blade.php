<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PANEL DE CONTROL DEL ADMINISTRADOR') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Mensaje de bienvenida -->
                    <h1 class="text-4xl font-bold text-center mb-8">Welcome Admin</h1>
                    
                    <!-- Tabla para mostrar datos de usuarios -->
                    <h3 class="text-lg font-bold mt-8 mb-4">Usuarios Registrados</h3>
                    <table class="table-auto w-full text-left">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nombre Completo</th>
                                <th class="px-4 py-2">Correo Electrónico</th>
                                <th class="px-4 py-2">Edad</th>
                                <th class="px-4 py-2">Peso</th>
                                <th class="px-4 py-2">Talla</th>
                                <th class="px-4 py-2">Membresía</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($userDetails as $detail)
                                <tr>
                                    <td class="border px-4 py-2">{{ $detail->nombre_completo }}</td>
                                    <td class="border px-4 py-2">{{ $detail->user->email }}</td>
                                    <td class="border px-4 py-2">{{ $detail->edad }}</td>
                                    <td class="border px-4 py-2">{{ $detail->peso }}</td>
                                    <td class="border px-4 py-2">{{ $detail->talla }}</td>
                                    <td class="border px-4 py-2">{{ $detail->membresia }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border px-4 py-2 text-center">No hay usuarios registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>