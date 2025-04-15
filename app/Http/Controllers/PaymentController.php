<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function showPlans()
    {
        return view('dashboard');
    }

    public function selectPlan($plan)
    {
        // Aquí solo validamos el plan seleccionado
        $validPlans = ['daily', 'weekly', 'monthly'];
        
        if (!in_array($plan, $validPlans)) {
            return back()->with('error', 'Plan no válido');
        }

        $prices = [
            'daily' => 5.00,
            'weekly' => 20.00,
            'monthly' => 50.00
        ];

        return view('dashboard', [
            'selectedPlan' => $plan,
            'price' => $prices[$plan]
        ]);
    }

    public function processPayment(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'card_number' => 'required|string|size:16',
            'expiry_date' => 'required|string|size:5',
            'cvv' => 'required|string|size:3',
            'cardholder_name' => 'required|string|max:255',
            'plan' => 'required|in:diario,semanal,mensual'
        ]);

        try {
            // Calcular fecha de vencimiento de la membresía
            $endDate = $this->calculateEndDate($validated['plan']);

            // Crear el registro de pago (la encriptación se maneja automáticamente)
            $payment = Payment::create([
                'user_id' => auth()->id(),
                'amount' => $this->getPlanPrice($validated['plan']),
                'card_number' => $validated['card_number'],
                'cvv' => $validated['cvv'],
                'cardholder_name' => $validated['cardholder_name'],
                'expiry_date' => $validated['expiry_date'],
                'status' => 'completed'
            ]);

            // Crear o actualizar la membresía
            Membership::updateOrCreate(
                ['user_id' => auth()->id()],
                [
                    'plan_type' => $validated['plan'],
                    'start_date' => now(),
                    'end_date' => $endDate,
                    'status' => 'active'
                ]
            );

            // Obtener el nombre del plan en español
            $planName = $this->getPlanName($validated['plan']);

            return redirect()->route('dashboard')
                           ->with('success', "¡Felicidades! Te has inscrito exitosamente al plan {$planName}. Tu membresía está activa hasta el " . $endDate->format('d/m/Y'));

        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un error al procesar el pago. Por favor, intenta nuevamente.');
        }
    }

    private function calculateEndDate($plan)
    {
        switch ($plan) {
            case 'diario':
                return now()->addDay();
            case 'semanal':
                return now()->addWeek();
            case 'mensual':
                return now()->addMonth();
            default:
                return now()->addDay();
        }
    }

    private function getPlanPrice($plan)
    {
        $prices = [
            'diario' => 10.00,
            'semanal' => 50.00,
            'mensual' => 150.00
        ];

        return $prices[$plan] ?? 0;
    }

    private function getPlanName($plan)
    {
        $names = [
            'diario' => 'Diario',
            'semanal' => 'Semanal',
            'mensual' => 'Mensual'
        ];

        return $names[$plan] ?? 'Desconocido';
    }
} 