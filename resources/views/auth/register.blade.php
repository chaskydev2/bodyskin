// ...existing code...
<div>
    <x-input-label for="name" :value="__('Nombre')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
</div>

<div class="mt-4">
    <x-input-label for="email" :value="__('Correo Electrónico')" />
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
</div>

<div class="mt-4">
    <x-input-label for="password" :value="__('Contraseña')" />
    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
</div>

<div class="mt-4">
    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
</div>
// ...existing code...