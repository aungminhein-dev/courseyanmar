<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::user())){
            if(url()->current() == route('guest.login') || url()->current() == route('guest.register') || url()->current() == route('guest.index')){
                return back();
            }
            if(Auth::user()->role == 'user'){
                return back();
            }
            return $next($request);
        }
        return $next($request);
    }
}
