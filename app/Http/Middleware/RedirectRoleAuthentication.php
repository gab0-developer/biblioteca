<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectRoleAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        

        $user = Auth::user(); 
        // hasRole: Es del paquete laravel-permission 

        if ($user) {
            # code...
            if ($user->hasRole('administrador')) {
                # code...
                return $next($request);
            }elseif ($user->hasRole('bibliotecario')) {
                # code...
                // Permitir acceso a las rutas de solicitudes
                if ($request->routeIs('solicitudLibro.*') || $request->routeIs('libros.*')) {
                    return $next($request);
                } else {
                    return redirect()->route('solicitudLibro.index');
                }
            }elseif ($user->hasRole('lector')) {
                // Permitir acceso a las rutas de libros
                if ($request->routeIs('libros.*') || $request->routeIs('solicitudLibro.store')) {
                    return $next($request);
                } else {
                    return redirect()->route('libros.index');
                }
            }
        }
        // Redireccionar a la página de inicio si el usuario no está autenticado
        return redirect('/')->with('error','Rol no reconocido');
    }
}
