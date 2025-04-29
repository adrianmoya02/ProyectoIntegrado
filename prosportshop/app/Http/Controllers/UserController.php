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
        // Aseguramos que solo un admin pueda acceder a este método
        if (Auth::user()->role != 'admin') {
            return redirect('/'); // Redirigir si no es admin
        }

        // Obtener todos los usuarios
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        // Aseguramos que solo un admin pueda acceder a este método
        if (Auth::user()->role != 'admin') {
            return redirect('/'); // Redirigir si no es admin
        }

        return view('user.create');
    }

    public function store(Request $request)
    {
        // Aseguramos que solo un admin pueda almacenar usuarios
        if (Auth::user()->role != 'admin') {
            return redirect('/'); // Redirigir si no es admin
        }
    
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin',
            'dni' => 'required|string|min:9|max:9',    
            'apell' => 'required|string|max:255', 
            'direccion' => 'required|string|max:255',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto válido.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
        
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser un texto válido.',
            'email.email' => 'Introduce una dirección de correo electrónico válida.',
            'email.max' => 'El correo electrónico no puede superar los 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
        
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser un texto válido.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        
            'role.required' => 'El rol es obligatorio.',
            'role.in' => 'El rol seleccionado no es válido.',
        
            'dni.required' => 'El DNI es obligatorio.',
            'dni.string' => 'El DNI debe ser un texto válido.',
            'dni.max' => 'El DNI no puede tener más de 9 caracteres.',
            'dni.min' => 'El DNI debe tener al menos 9 caracteres.',
        
            'apell.required' => 'El apellido es obligatorio.',
            'apell.string' => 'El apellido debe ser un texto válido.',
            'apell.max' => 'El apellido no puede tener más de 255 caracteres.',
        
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.string' => 'La dirección debe ser un texto válido.',
            'direccion.max' => 'La dirección no puede superar los 255 caracteres.',
        ]);
        
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->dni = $request->dni; 
        $user->apell = $request->apell; 
        $user->direccion = $request->direccion; 
        $user->save();
    
        return redirect()->route('user.index')->with('success', 'Usuario creado correctamente.');
    }
    

    public function edit(User $user)
    {
        // Aseguramos que solo un admin pueda editar usuarios
        if (Auth::user()->role != 'admin') {
            return redirect('/'); // Redirigir si no es admin
        }

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    if (Auth::user()->role != 'admin') {
        return redirect('/'); 
    }

    $request->validate([
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:user,admin',
        'dni' => 'required|string|min:9|max:9',    
        'apell' => 'required|string|max:255', 
        'direccion' => 'required|string|max:255',
    ], [
        'name.required' => 'El nombre es obligatorio.',
        'name.string' => 'El nombre debe ser un texto válido.',
        'name.max' => 'El nombre no puede tener más de 255 caracteres.',
        'name.min' => 'El nombre debe tener al menos 3 caracteres.',
    
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.string' => 'El correo electrónico debe ser un texto válido.',
        'email.email' => 'Introduce una dirección de correo electrónico válida.',
        'email.max' => 'El correo electrónico no puede superar los 255 caracteres.',
        'email.unique' => 'Este correo electrónico ya está registrado.',
    
        'password.required' => 'La contraseña es obligatoria.',
        'password.string' => 'La contraseña debe ser un texto válido.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
    
        'role.required' => 'El rol es obligatorio.',
        'role.in' => 'El rol seleccionado no es válido.',
    
        'dni.required' => 'El DNI es obligatorio.',
        'dni.string' => 'El DNI debe ser un texto válido.',
        'dni.max' => 'El DNI no puede tener más de 9 caracteres.',
        'dni.min' => 'El DNI debe tener al menos 9 caracteres.',
    
        'apell.required' => 'El apellido es obligatorio.',
        'apell.string' => 'El apellido debe ser un texto válido.',
        'apell.max' => 'El apellido no puede tener más de 255 caracteres.',
    
        'direccion.required' => 'La dirección es obligatoria.',
        'direccion.string' => 'La dirección debe ser un texto válido.',
        'direccion.max' => 'La dirección no puede superar los 255 caracteres.',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role;
    $user->dni = $request->dni; 
    $user->apell = $request->apell; 
    $user->direccion = $request->direccion; 

    if ($request->password) {
        $request->validate([
            'password' => 'string|min:8|confirmed',
        ]);
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('user.index')->with('success', 'Usuario actualizado correctamente.');
}

    public function destroy(User $user)
    {
        // Aseguramos que solo un admin pueda eliminar usuarios
        if (Auth::user()->role != 'admin') {
            return redirect('/'); // Redirigir si no es admin
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'Usuario eliminado correctamente.');
    }
    

}
