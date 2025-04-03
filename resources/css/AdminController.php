<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;

class AdminController extends Controller
{
    /**
     * Muestra el panel de control del administrador.
     */
    public function index()
    {
        // Recuperar los datos de todos los usuarios registrados
        $userDetails = UserDetail::with('user')->get();

        // Pasar los datos a la vista
        return view('admin.dashboard', compact('userDetails'));
    }
}
