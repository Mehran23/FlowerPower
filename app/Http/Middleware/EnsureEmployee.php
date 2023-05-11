<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_employee) {
            return $next($request);
        }

          // Als de gebruiker geen medewerker is, redirect naar een geschikte pagina of toon een foutmelding
          return redirect('/')->withErrors(['not_employee' => 'U moet een medewerker zijn om toegang te krijgen tot deze pagina.']);
    }
}