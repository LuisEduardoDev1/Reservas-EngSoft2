<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipoUserController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        $tipoUsuario = auth()->user()->tipo;
        $rota = $request->route()->getName();


        // Se o tipo de usuário for 1 (PUBLICO)
        if ($tipoUsuario != 1) {
            if (strpos($rota, 'Usr') !== false) {
                abort(403, 'Acesso não autorizado.');
            }
        }

        // Se o tipo de usuário for 2 (PROFESSOR)
        if ($tipoUsuario != 2) {
            if (strpos($rota, 'Prof') !== false) {
                abort(403, 'Acesso não autorizado.');
            }
        }

        // Se o tipo de usuário for 3 (DIRETOR)
        if ($tipoUsuario != 3) {
            if (strpos($rota, 'Dir') !== false) {
                abort(403, 'Acesso não autorizado.');
            }
        }

        // Se o tipo de usuário for 4 (PRO-REITURA)
        if ($tipoUsuario != 4) {
            if (strpos($rota, 'ProRei') !== false) {
                abort(403, 'Acesso não autorizado.');
            }
        }
        
        // Se o tipo de usuário for 5 (PREFEITURA)
        if ($tipoUsuario != 5) {
            if (strpos($rota, 'Pref') !== false) {
                abort(403, 'Acesso não autorizado.');
            }
        }

        return $next($request);
    }
    
}
