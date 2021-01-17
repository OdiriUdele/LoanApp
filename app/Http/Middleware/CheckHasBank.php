<?php

namespace App\Http\Middleware;

use Closure;

class CheckHasBank
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
        if(!helper_is_admin() && !helper_user_payauth_active()) {
            return redirect()->route('profile.index')->with('error','There is no bank detail attached to your profile please <a href="/profile/1/edit"><b>Click HERE</b></a> to do so.');
        }

        return $next($request);
    }
}
