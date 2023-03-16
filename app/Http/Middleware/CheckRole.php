<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
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
        $roles = array_slice(func_get_args(), 2);

        foreach ($roles as $role) { 
            $user = \Auth::user()->role ?? 0;
            if( $user == $role){
                return $next($request);
            }
        }
        
        if( $user == 'admin'){
            return redirect('/admin');
        }else if($user == 'user'){
            return redirect('/user');
        }else{
            return redirect('/');
        }
    }
}
