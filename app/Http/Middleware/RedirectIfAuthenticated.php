<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //here guard is either equal to admin or user guard
        switch ($guard){
            case 'admin': //if they are an admin and they try to access an admin page then the admin guard will
                if(Auth::guard($guard)->check()){ //pick that and redirect to the admin.dashboard but if they are logged in as a user then the
                    return redirect()->route('admin.dashboard'); //auth::guard will check that and then break out of the switch statement
                }
                break;

            default:
                if (Auth::guard($guard)->check()) {
                    return redirect(RouteServiceProvider::HOME);
                }
                break;
        }
        return $next($request);
    }
}
