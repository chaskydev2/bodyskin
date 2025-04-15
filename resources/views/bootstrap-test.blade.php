<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Prueba de Bootstrap') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Prueba de Bootstrap</h1>
                    <p class="mb-4">Esta página muestra varios componentes de Bootstrap para verificar que está funcionando correctamente.</p>
                    
                    <hr class="my-4">
                    
                    <h2 class="text-xl font-bold mb-2">Botones</h2>
                    <div class="mb-4">
                        <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded">Primary</button>
                        <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded">Secondary</button>
                        <button type="button" class="px-4 py-2 bg-green-500 text-white rounded">Success</button>
                        <button type="button" class="px-4 py-2 bg-red-500 text-white rounded">Danger</button>
                        <button type="button" class="px-4 py-2 bg-yellow-500 text-white rounded">Warning</button>
                        <button type="button" class="px-4 py-2 bg-blue-300 text-white rounded">Info</button>
                        <button type="button" class="px-4 py-2 bg-gray-200 text-gray-800 rounded">Light</button>
                        <button type="button" class="px-4 py-2 bg-gray-800 text-white rounded">Dark</button>
                    </div>
                    
                    <h2 class="text-xl font-bold mb-2">Alertas</h2>
                    <div class="mb-4">
                        <div class="p-4 bg-blue-100 text-blue-800 rounded mb-2" role="alert">
                            Esta es una alerta primaria.
                        </div>
                        <div class="p-4 bg-gray-100 text-gray-800 rounded mb-2" role="alert">
                            Esta es una alerta secundaria.
                        </div>
                        <div class="p-4 bg-green-100 text-green-800 rounded mb-2" role="alert">
                            Esta es una alerta de éxito.
                        </div>
                        <div class="p-4 bg-red-100 text-red-800 rounded mb-2" role="alert">
                            Esta es una alerta de peligro.
                        </div>
                    </div>
                    
                    <h2 class="text-xl font-bold mb-2">Tarjetas</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div class="border rounded-lg overflow-hidden">
                            <div class="p-4">
                                <h5 class="text-lg font-bold mb-2">Título de la tarjeta</h5>
                                <p class="mb-4">Este es un ejemplo de texto dentro de una tarjeta.</p>
                                <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded inline-block">Ir a algún lugar</a>
                            </div>
                        </div>
                        <div class="border rounded-lg overflow-hidden">
                            <div class="p-4">
                                <h5 class="text-lg font-bold mb-2">Título de la tarjeta</h5>
                                <p class="mb-4">Este es un ejemplo de texto dentro de una tarjeta.</p>
                                <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded inline-block">Ir a algún lugar</a>
                            </div>
                        </div>
                        <div class="border rounded-lg overflow-hidden">
                            <div class="p-4">
                                <h5 class="text-lg font-bold mb-2">Título de la tarjeta</h5>
                                <p class="mb-4">Este es un ejemplo de texto dentro de una tarjeta.</p>
                                <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded inline-block">Ir a algún lugar</a>
                            </div>
                        </div>
                    </div>
                    
                    <h2 class="text-xl font-bold mb-2">Formulario</h2>
                    <form class="mb-4">
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                            <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md" id="exampleInputEmail1">
                            <div class="mt-1 text-sm text-gray-500">Nunca compartiremos tu correo electrónico con nadie más.</div>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                            <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md" id="exampleInputPassword1">
                        </div>
                        <div class="mb-4 flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" id="exampleCheck1">
                            <label class="ml-2 block text-sm text-gray-700" for="exampleCheck1">Recuérdame</label>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Enviar</button>
                    </form>
                    
                    <h2 class="text-xl font-bold mb-2">Tabla</h2>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellido</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Mark</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Otto</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">@mdo</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jacob</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Thornton</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">@fat</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Larry</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Bird</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 