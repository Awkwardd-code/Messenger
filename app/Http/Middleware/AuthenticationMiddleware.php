<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if(auth()->user() && auth()->user()->is_varified == 1 && auth()->user()->is_processed == 1){
            return $next($request);
        }elseif(auth()->user() && auth()->user()->super_admin == 1 ){
            return $next($request);
        }
        /* elseif (auth()->user() && auth()->user()->super_admin == 1 ) {
            return redirect('/dashboard');
            # code...
        } *//* elseif (auth()->user() && auth()->user()->is_admin == 1 && auth()->user()->is_varified == 0 && auth()->user()->token !=0) {
            return redirect('/varification');
        }elseif(auth()->user() && auth()->user()->is_admin == 1 && auth()->user()->is_varified == 0 && auth()->user()->token ==0){
            return redirect('/processing');
        } */
        return redirect('/');
    }
}
