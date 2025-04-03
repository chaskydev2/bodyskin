<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Actualiza los datos del usuario autenticado.
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        // Validar los datos
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'birth_date' => ['nullable', 'date'],
        ]);

        // Actualizar los datos del usuario
        $user->update($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->route('dashboard')->with('status', 'Datos actualizados correctamente.');
    }
}
