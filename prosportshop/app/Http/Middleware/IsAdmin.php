<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Verificamos si el usuario está autenticado y si tiene el rol 'admin'
        if (auth()->user() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        // Si no es administrador, lo redirige
        return redirect('/'); // Redirige si no es administrador
    }
}
