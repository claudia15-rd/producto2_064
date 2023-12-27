<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class LoginGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Verificar si hay una sesión abierta y existe la clave userId
        $userId = Session::get('userId');
        if (isset($userId)) {
            // Obtener el tipo de usuario
            $userTypeId = Session::get('userTypeId');

            // Redirigir según el tipo de usuario
            switch ($userTypeId) {
                case 1:
                    return redirect('/paneladmin/actos');
                    break;
                case 2:
                    return redirect('/login');
                    break;
                case 3:
                    return redirect('/panelusuario/dia');
                    break;
            }
        }

        return $next($request);
    }
}
