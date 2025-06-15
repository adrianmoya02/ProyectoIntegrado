<?php
// app/Http/Controllers/MetodoPagoController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodoPago;
use Illuminate\Support\Facades\Auth;

class MetodoPagoController extends Controller
{
    public function create()
    {
        return view('metodos_pago.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titular' => 'required|string|max:255',
            'entidad_bancaria' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
        ]);

        MetodoPago::create([
            'id_usuario' => Auth::id(),
            'numero_cuenta' => Auth::user()->numero_cuenta,
            'titular' => $request->titular,
            'entidad_bancaria' => $request->entidad_bancaria,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('movimientos.create')->with('success', 'Método de pago añadido correctamente.');
    }
}