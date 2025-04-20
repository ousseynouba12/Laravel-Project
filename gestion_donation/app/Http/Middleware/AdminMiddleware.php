<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié et est un administrateur
        if (Auth::check() && Auth::user() instanceof \App\Models\Administrateur) {
        return $next($request);
        }

        // Rediriger vers la page de connexion avec un message d'erreur
        return redirect()->route('login')->with('error', 'Vous devez être connecté en tant qu\'administrateur pour accéder à cette page.');
    }
}
