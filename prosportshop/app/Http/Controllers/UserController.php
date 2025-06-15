<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->rol != 'admin') {
            return redirect('/');
        }

        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        if (Auth::user()->rol != 'admin') {
            return redirect('/');
        }

        return view('user.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->rol != 'admin') {
            return redirect('/');
        }

        $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'primer_apellido' => 'nullable|string|max:255',
            'segundo_apellido' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'numero_cuenta' => 'nullable|string|max:255',
            'rol' => 'required|in:user,admin',
            'localidad' => 'nullable|string|max:255',
            'provincia' => 'nullable|string|max:255',
            'codigo_postal' => 'nullable|string|max:10',
            'telefono' => 'nullable|string|max:15',
            'fecha_nacimiento' => 'nullable|date',
            'estado' => 'required|in:activo,inactivo',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->nombre = $request->nombre;
        $user->primer_apellido = $request->primer_apellido;
        $user->segundo_apellido = $request->segundo_apellido;
        $user->direccion = $request->direccion;
        $user->email = $request->email;
        $user->numero_cuenta = $request->numero_cuenta;
        $user->rol = $request->rol;
        $user->localidad = $request->localidad;
        $user->provincia = $request->provincia;
        $user->codigo_postal = $request->codigo_postal;
        $user->telefono = $request->telefono;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->estado = $request->estado;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $user)
    {
        if (Auth::user()->rol != 'admin') {
            return redirect('/');
        }

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (Auth::user()->rol != 'admin') {
            return redirect('/');
        }

        $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'primer_apellido' => 'nullable|string|max:255',
            'segundo_apellido' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id_usuario . ',id_usuario',
            'numero_cuenta' => 'nullable|string|max:255',
            'rol' => 'required|in:user,admin',
            'localidad' => 'nullable|string|max:255',
            'provincia' => 'nullable|string|max:255',
            'codigo_postal' => 'nullable|string|max:10',
            'telefono' => 'nullable|string|max:15',
            'fecha_nacimiento' => 'nullable|date',
            'estado' => 'required|in:activo,inactivo',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->nombre = $request->nombre;
        $user->primer_apellido = $request->primer_apellido;
        $user->segundo_apellido = $request->segundo_apellido;
        $user->direccion = $request->direccion;
        $user->email = $request->email;
        $user->numero_cuenta = $request->numero_cuenta;
        $user->rol = $request->rol;
        $user->localidad = $request->localidad;
        $user->provincia = $request->provincia;
        $user->codigo_postal = $request->codigo_postal;
        $user->telefono = $request->telefono;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->estado = $request->estado;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        if (Auth::user()->rol != 'admin') {
            return redirect('/');
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
