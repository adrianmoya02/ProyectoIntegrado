<?php

namespace App\Http\Controllers;

use App\Models\MovimientoSaldo;
use Illuminate\Http\Request;
use App\Models\MetodoPago;

class MovimientoSaldoController extends Controller
{

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'tipo' => 'required|string|in:ingreso,retiro',
            'cantidad' => 'required|numeric|min:0.01',
            'fecha' => 'required|date',
            'id_metodo_pago' => 'required|exists:metodos_pago,id_metodo_pago',
        ]);

        $usuario = auth()->user();

        // Calcula el saldo actual del usuario
        $saldo = MovimientoSaldo::where('id_usuario', $usuario->id_usuario)
            ->selectRaw("SUM(CASE WHEN tipo = 'ingreso' THEN cantidad ELSE -cantidad END) as saldo")
            ->value('saldo') ?? 0;

        // Si es un retiro, verifica que el saldo sea suficiente
        if ($request->tipo === 'retiro' && $request->cantidad > $saldo) {
            return back()
                ->withInput()
                ->withErrors(['cantidad' => 'El importe es mayor al saldo disponible. Saldo actual: ' . number_format($saldo, 2) . ' €']);
        }

        // Crear el movimiento de saldo
        MovimientoSaldo::create([
            'id_usuario' => $usuario->id_usuario,
            'tipo' => $request->tipo,
            'cantidad' => $request->cantidad,
            'fecha' => $request->fecha,
            'id_metodo_pago' => $request->id_metodo_pago,
        ]);

        return redirect()->route('movimientos.create')->with('success', 'Movimiento registrado con éxito.');
    }
    public function create()
    {
        $user = auth()->user();
        $metodosPago = \App\Models\MetodoPago::where('id_usuario', $user->id_usuario)->get();

        return view('movimiento_saldo.create', compact('metodosPago'));
    }

}



