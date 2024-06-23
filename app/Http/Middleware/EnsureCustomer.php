<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureCustomer
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->roles_name=== 'Customer') {
            return $next($request);
        }

        return redirect('/send-mail-form')->with('error', 'You do not have permission to access this resource.');
    }
}
