<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');
        if ( (Auth::guard('admin')->user()->role_id == 1 || Auth::guard('admin')->user()->id == $id)) {
            return $next($request);
        } else {

            return abort(401);
        }
    }
}
