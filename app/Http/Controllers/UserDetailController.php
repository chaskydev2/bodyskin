<?php
namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDetailController extends Controller
{
    /**
     * Almacena los datos del usuario.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'edad' => 'required|integer',
            'peso' => 'required|string',
            'talla' => 'required|string',
            'membresia' => 'required|string',
        ]);

        UserDetail::create([
            'user_id' => Auth::id(),
            ...$validated,
        ]);

        return redirect()->route('dashboard')->with('status', 'Datos añadidos correctamente.');
    }

    /**
     * Muestra los datos del usuario autenticado.
     */
    public function index()
    {
        $userDetails = UserDetail::where('user_id', Auth::id())->get();

        // Pasar los datos a la vista
        return view('dashboard', compact('userDetails'));
    }

    /**
     * Actualiza los datos del usuario.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'edad' => 'required|integer',
            'peso' => 'required|string',
            'talla' => 'required|string',
            'membresia' => 'required|string',
        ]);

        $userDetail = UserDetail::findOrFail($id);
        $userDetail->update($validated);

        return redirect()->route('dashboard')->with('status', 'Datos actualizados correctamente.');
    }
}
