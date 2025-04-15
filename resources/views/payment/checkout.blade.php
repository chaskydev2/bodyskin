@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white py-12">
    <div class="max-w-xl mx-auto px-4">
        <!-- Paso -->
        <div class="mb-6">
            <p class="text-sm text-gray-600">CONFIGURACIÓN DE PAGO</p>
        </div>

        <!-- Título -->
        <h1 class="text-3xl font-bold text-gray-900 mb-8">
            Configura tu método de pago
        </h1>

        <!-- Iconos de tarjetas -->
        <div class="flex space-x-2 mb-6">
            <img src="https://assets.nflxext.com/siteui/acquisition/payment/ffe/paymentpicker/VISA.png" alt="Visa" class="h-6">
            <img src="https://assets.nflxext.com/siteui/acquisition/payment/ffe/paymentpicker/MASTERCARD.png" alt="Mastercard" class="h-6">
            <img src="https://assets.nflxext.com/siteui/acquisition/payment/ffe/paymentpicker/AMEX.png" alt="American Express" class="h-6">
        </div>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('payment.process') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="plan" value="{{ request('plan') }}">

            <!-- Número de tarjeta -->
            <div class="relative">
                <input type="text" 
                       name="card_number"
                       class="w-full px-4 py-3 border border-gray-300 rounded text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       placeholder="Número de tarjeta"
                       maxlength="16"
                       required>
                <span class="absolute right-3 top-3 text-gray-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                </span>
            </div>

            <!-- Fecha y CVV -->
            <div class="grid grid-cols-2 gap-4">
                <input type="text" 
                       name="expiry_date"
                       class="px-4 py-3 border border-gray-300 rounded text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       placeholder="MM/YY"
                       maxlength="5"
                       required>
                
                <div class="relative">
                    <input type="text" 
                           name="cvv"
                           class="w-full px-4 py-3 border border-gray-300 rounded text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           placeholder="CVV"
                           maxlength="3"
                           required>
                    <span class="absolute right-3 top-3 text-gray-400 cursor-help">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Nombre en la tarjeta -->
            <input type="text" 
                   name="cardholder_name"
                   class="w-full px-4 py-3 border border-gray-300 rounded text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                   placeholder="Nombre en la tarjeta"
                   required>

            <!-- Plan seleccionado -->
            <div class="bg-gray-50 p-4 rounded flex justify-between items-center mt-6">
                <div>
                    <p class="text-gray-900" id="plan-price"></p>
                    <p class="text-gray-600" id="plan-name"></p>
                    <ul class="text-sm text-gray-600 mt-2">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Acceso completo al gimnasio
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Uso de equipos
                        </li>
                        <li id="plan-extras" class="flex items-center">
                        </li>
                    </ul>
                </div>
                <a href="/dashboard" class="text-blue-500 hover:underline">Cambiar</a>
            </div>

            <!-- Texto legal -->
            <div class="text-sm text-gray-500 mt-4 space-y-4">
                <p>Los pagos se procesarán de forma segura. Es posible que se apliquen cargos adicionales según tu banco.</p>
                
                <p>Al hacer clic en el botón «Iniciar membresía», aceptas nuestros 
                    <a href="#" class="text-blue-500 hover:underline">Términos de uso</a> y nuestra 
                    <a href="#" class="text-blue-500 hover:underline">Política de privacidad</a>. 
                    Tu membresía se renovará automáticamente al final del período seleccionado con el mismo plan, 
                    a menos que decidas cancelar. Puedes cancelar tu membresía en cualquier momento desde tu perfil 
                    para evitar cargos futuros.
                </p>
            </div>

            <!-- Botón de inicio -->
            <button type="submit" 
                    class="w-full bg-red-600 text-white py-4 text-xl font-semibold rounded hover:bg-red-700 transition-colors duration-200 mt-6">
                Iniciar membresía
            </button>

            <!-- Seguridad -->
            <p class="text-sm text-gray-500 mt-4">
                Esta página está protegida con encriptación SSL para garantizar la seguridad de tus datos.
            </p>
        </form>
    </div>
</div>

<script>
    // Obtener parámetros de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const plan = urlParams.get('plan');
    const price = urlParams.get('price');

    // Configurar el contenido según el plan
    if (plan === 'diario') {
        document.getElementById('plan-name').textContent = 'Plan Diario';
        document.getElementById('plan-price').textContent = '$10/día';
        document.getElementById('plan-extras').innerHTML = `
            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Sin compromiso de permanencia`;
    } else if (plan === 'semanal') {
        document.getElementById('plan-name').textContent = 'Plan Semanal';
        document.getElementById('plan-price').textContent = '$50/semana';
        document.getElementById('plan-extras').innerHTML = `
            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            1 clase grupal incluida`;
    } else if (plan === 'mensual') {
        document.getElementById('plan-name').textContent = 'Plan Mensual';
        document.getElementById('plan-price').textContent = '$150/mes';
        document.getElementById('plan-extras').innerHTML = `
            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            4 clases grupales + 1 sesión con entrenador`;
    }
</script>
@endsection 