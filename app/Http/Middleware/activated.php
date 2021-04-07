<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class activated
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
        //Check if the user account is activated or not
        if(auth()->user()->status == 'active'){
            return $next($request);
        }else {
            return redirect('home')->with('status',trans('your_account_is_under_confirming'));
        }
    }
}
