<?php

namespace App\Http\Middleware;

use App\Models\Path;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckOrganization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (Auth::check()) {
            if (!Path::query()->where('person_id', Auth::user()->person->id)->exists() && !$request->routeIs('register.organization')) {
                return to_route('register.organization');
            }
        }

        return $response;
    }
}
