<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 dark:bg-gray-900">
    <!-- Header Image -->
    <div class="w-full h-80 bg-cover bg-center mb-8 rounded-lg shadow-lg" style="background-image: url('https://assets.worldgym.com/media/38_e605e5d776.png');">
        <div class="h-full w-full bg-black bg-opacity-50 flex items-center justify-center">
            <h1 class="text-4xl font-bold text-white">Regístrate en Nuestro Gimnasio</h1>
        </div>
    </div>

    <!-- Registration Form -->
    <div class="w-full max-w-md bg-gray-900 dark:bg-gray-800 rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-center text-white mb-6">Crear Cuenta</h2>
        <form wire:submit="register">
            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Nombre Completo')" class="text-white" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" placeholder="Ingresa tu nombre completo" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Correo Electrónico')" class="text-white" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" placeholder="Ingresa tu correo electrónico" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Contraseña')" class="text-white" />
                <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Ingresa tu contraseña" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-white" />
                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirma tu contraseña" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
<!--
            <div class="mb-4">
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>
-->
            <!-- Already Registered and Submit -->
            <div class="flex items-center justify-between">
                <a class="text-sm text-indigo-400 hover:underline" href="{{ route('login') }}" wire:navigate>
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>

                <x-primary-button class="ml-3">
                    {{ __('Registrarse') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
