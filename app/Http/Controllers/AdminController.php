<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Muestra el panel de control del administrador.
     */
    public function index()
    {
        // Verificar si el usuario está autenticado como administrador
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        // Recuperar los datos de todos los usuarios registrados
        $userDetails = UserDetail::with('user')->get();

        // Pasar los datos a la vista específica del administrador
        return view('admin.dashboard', compact('userDetails'));
    }
}
