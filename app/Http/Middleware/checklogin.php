<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class checklogin
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
        // if(Auth::check())
        // {
        //     view()->share('use',Auth::User());
        //     return $next($request);
        //     //echo "đã login hihi";
        // }
        // return $next($request);
        // else
        // {
        //     //view()->share('use','chua login 1');
        //     //return redirect('admin');
        //    //return redirect('index');
        //     //echo "chưa login";
        // }   
    }
}
