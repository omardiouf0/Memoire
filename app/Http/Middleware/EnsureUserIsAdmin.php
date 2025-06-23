<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
       // Si l'utilisateur n'est pas connecté
    if (!auth()->check()) {
        // Stocke l'URL actuelle avant redirection
        if (!$request->is('admin/login') && !$request->is('admin/logout')) {
            session()->put('url.intended', $request->url());
        }
        return redirect()->route('filament.admin.auth.login');
    }

    // Si l'utilisateur n'est pas admin
    if (auth()->user()->role !== 'admin') {
        // Déconnecte l'utilisateur avant de montrer l'erreur 403
        auth()->logout();
        abort(403, 'Accès réservé aux administrateurs');
    }

        return $next($request);
    }
}