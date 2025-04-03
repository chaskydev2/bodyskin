<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AdminAuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.admin-login');
    }

    public function store(LoginRequest $request)
    {
        try {
            $request->authenticate('admin');
            $request->session()->regenerate();
            Log::info('Admin login successful', ['email' => $request->email]);
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
        } catch (ValidationException $e) {
            Log::warning('Admin login failed', [
                'email' => $request->email,
                'error' => $e->getMessage(),
                'errors' => $e->errors()
            ]);
            throw $e;
        } catch (\Exception $e) {
            Log::error('Admin login error', [
                'email' => $request->email,
                'error' => $e->getMessage()
            ]);
            return back()->withErrors([
                'email' => 'Ocurrió un error al intentar iniciar sesión. Por favor, intente nuevamente.',
            ])->onlyInput('email');
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
} 