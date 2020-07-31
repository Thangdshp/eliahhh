<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAdminLogin
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
        // if user logined
        if (Auth::check())
        {
            $user = Auth::user();
            // if level =1 (admin) or level = 0 (root admin), status = 1 (actived) next.
            if (($user->level == 1 && $user->user_status == 1) || ($user->level == 0 && $user->user_status == 1) )
            {
                return $next($request);
            }
            else
            {
                Auth::logout();
                return redirect()->route('admin.getLogin')->with('error','You are not authorized to access');
            }
        }
        return redirect()->route('admin.getLogin')->with('error','You must be login');
    }
}
