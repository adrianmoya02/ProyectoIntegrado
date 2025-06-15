<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'primer_apellido' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'segundo_apellido' => ['nullable', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'direccion' => ['required', 'string', 'max:255'],
            'localidad' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'provincia' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'numero_cuenta' => ['required', 'digits_between:10,24', 'regex:/^[0-9]+$/'],
            'codigo_postal' => ['required', 'digits_between:4,10', 'regex:/^[0-9]+$/'],
            'telefono' => ['required', 'digits_between:9,15', 'regex:/^[0-9]+$/'],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
        ], [
            'nombre.regex' => 'El nombre solo puede contener letras.',
            'primer_apellido.regex' => 'El primer apellido solo puede contener letras.',
            'segundo_apellido.regex' => 'El segundo apellido solo puede contener letras.',
            'localidad.regex' => 'La localidad solo puede contener letras.',
            'email.email' => 'Introduce una dirección de correo electrónico válida.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'direccion.max' => 'La dirección no puede tener más de 255 caracteres.',
            'direccion.required' => 'La dirección es obligatoria.',
            'numero_cuenta.digits_between' => 'El número de cuenta debe tener entre 10 y 24 dígitos.',
            'codigo_postal.digits_between' => 'El código postal debe tener entre 4 y 10 dígitos.',
            'telefono.digits_between' => 'El teléfono debe tener entre 9 y 15 dígitos.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'provincia.regex' => 'La provincia solo puede contener letras.',
            'numero_cuenta.regex' => 'El número de cuenta solo puede contener números.',
            'codigo_postal.regex' => 'El código postal solo puede contener números.',
            'telefono.regex' => 'El teléfono solo puede contener números.',
            'fecha_nacimiento.before_or_equal' => 'Debes ser mayor de 18 años.',
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'primer_apellido' => $request->primer_apellido,
            'segundo_apellido' => $request->segundo_apellido,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'numero_cuenta' => $request->numero_cuenta,
            'rol' => $request->rol,
            'localidad' => $request->localidad,
            'provincia' => $request->provincia,
            'codigo_postal' => $request->codigo_postal,
            'telefono' => $request->telefono,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'estado' => $request->estado,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Usuario registrado correctamente');
    }
}
