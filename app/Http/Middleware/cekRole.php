<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'owner') {
            // Owner role, restrict actions
            $this->restrictOwnerActions($request);
        }
        return $next($request);
    }
    
    private function restrictOwnerActions(Request $request)
    {
        // Restrict actions for owner role
        if ($request->isMethod('GET')) {
            // Allow only show and download actions for GET requests
            return true;
        } elseif ($request->isMethod('POST') && $request->route()->getName() == 'transaction.download') {
            // Allow download action for POST requests with transaction/download route
            return true;
        } else {
            // Abort all other requests
            abort(404);
        }
    }
}
