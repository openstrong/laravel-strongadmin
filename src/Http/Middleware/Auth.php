<?php

namespace OpenStrong\StrongAdmin\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

/**
 * 登录认证检测
 */
class Auth
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
        if (in_array(Route::current()->uri, $this->getIgnoreUrl()))
        {
            return $next($request);
        }
        if (!auth()->guard(config('strongadmin.guard'))->check())
        {
            return redirect(route('strongadmin.login'));
            //return response()->json(['code' => 401, 'msg' => '请登录']);
        }
        return $next($request);
    }

    protected function getIgnoreUrl()
    {
        return config('strongadmin.ignore_auth_check_url');
    }

}
