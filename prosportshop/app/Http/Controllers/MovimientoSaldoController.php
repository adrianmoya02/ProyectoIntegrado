<?php

namespace App\Http\Controllers;

use App\Models\MovimientoSaldo;
use Illuminate\Http\Request;

class MovimientoSaldoController extends Controller
{
    public function create()
    {
        return view('movimiento_saldo.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'tipo' => 'required|string|in:ingreso,retiro',
            'cantidad' => 'required|numeric|min:0.01',
            'fecha' => 'required|date',
        ]);

        // Crear el movimiento de saldo
        MovimientoSaldo::create([
            'id_usuario' => auth()->id(),
            'tipo' => $request->tipo,
            'cantidad' => $request->cantidad,
            'fecha' => $request->fecha,
        ]);

        return redirect()->route('movimientos.create')->with('success', 'Movimiento registrado con éxito.');
    }
}



