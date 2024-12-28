<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BorrowerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('borrower')->check()) {
            return redirect('/borrower/login');
        }

        return $next($request);
    }


}
