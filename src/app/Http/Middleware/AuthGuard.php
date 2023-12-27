<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AuthGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = Session::get('userId');
        $url = $request->path();
        if(!isset($userId)){
            return redirect('/login');
        } /*else {
            // Obtener el tipo de usuario
            $userTypeId = Session::get('userTypeId');
            
            if ($url == '/logout') return $next($request);
            // Redirigir según el tipo de usuario
            if ($userTypeId == 1) {
                if (strpos($url, 'paneladmin') == false){
                    $request->session()->remove('url.intended');
                    return redirect('/paneladmin/actos');
                }
                die("contiene");
            } else if ($userTypeId == 2) {
                if (strpos($url, 'paneladmin') == false) 
                    return $next($request);
            } else if ($userTypeId == 3) {
                if (strpos($url, 'panelusuario') == false) 
                    return redirect('/panelusuario/dia');
            }
        }*/

        return $next($request);
    }
}
