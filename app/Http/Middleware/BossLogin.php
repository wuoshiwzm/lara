<?php

namespace App\Http\Middleware;

use Closure;

class BossLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!session('user')){
            return redirect('admin/login');
        }
        if(session('user')->user_class!=0){
            return redirect('');
        }
//        echo "middleware admin.login pass!";
        return $next($request);
    }
}
