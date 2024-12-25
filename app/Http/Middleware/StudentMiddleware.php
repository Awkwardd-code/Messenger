<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // return $next($request);
       /* if(auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_varified == 1 && auth()->user()->is_processed == 1){
            return $next($request);
        }elseif (auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_processed == 0) {
            return redirect('/processing');
            if(auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_varified == 0){
                return redirect('/varification');
            }
            
        }//
        return redirect('/'); */
        /* if(auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_varified == 1 && auth()->user()->token !=0 ){
            return $next($request);
        }elseif (auth()->user() && auth()->user()->is_admin == 1 && auth()->user()->is_varified == 0 && auth()->user()->token !=0) {
            return redirect('/varification');
        }elseif(auth()->user() && auth()->user()->is_admin == 1 && auth()->user()->is_varified == 0 && auth()->user()->token ==0){
            return redirect('/processing');
        }
        return redirect('/');  */
        /* if(auth()->user() && auth()->user()->super_admin == 1){
            
            return $next($request);
        }elseif(auth()->user() && auth()->user()->token ==0){
            return redirect('/processing');
        }
        else{
            if(auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_varified == 1 && auth()->user()->token !=0 ){
                return $next($request);
            }elseif (auth()->user() && auth()->user()->is_admin == 1 && auth()->user()->is_varified == 0 && auth()->user()->token !=0) {
                return redirect('/varification');
            }
            return redirect('/'); 
        } */
        /* if (!Auth::check()) {
            // Redirect or return an error response
             // Change 'login' to your route name
            return redirect('/');
        }else{
            if(auth()->user() && auth()->user()->super_admin == 1){
                return $next($request);
            }
            elseif(auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_varified == 1 && auth()->user()->is_processed == 1){
                return $next($request);
            }elseif(auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_varified == 0) {
                
                if(auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_processed == 0){
                    
                    return redirect('/processing');
                }elseif(auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_processed == 1 && auth()->user()->is_varified == 0) {
                    return redirect('/varification'); 
                }
                
            }
        } */
        /* if(auth()->user() && auth()->user()->super_admin == 1){
            return $next($request);
        }
        elseif(auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_varified == 1 && auth()->user()->is_processed == 1){
            return $next($request);
        }elseif(auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_varified == 0) {
            
            if(auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_processed == 0){
                
                return redirect('/processing');
            }elseif(auth()->user() && auth()->user()->is_admin == 0 && auth()->user()->is_processed == 1 && auth()->user()->is_varified == 0) {
                return redirect('/varification'); 
            }
            
        } *///
        /* return redirect('/'); */
        if(auth()->user() && auth()->user()->is_admin == 0 &&  auth()->user()->super_admin == 0  && auth()->user()->is_varified == 1 && auth()->user()->is_processed == 1){
            return $next($request);
        }elseif (auth()->user() && auth()->user()->super_admin == 1 ) {
            # code...
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
