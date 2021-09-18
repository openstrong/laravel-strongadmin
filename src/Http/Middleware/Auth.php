<?php

namespace OpenStrong\StrongAdmin\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

/**
 * 登录认证检测
 */
class Auth
{

    //忽略检测的路由
    public $ignore_auth_url = ['strongadmin/login', 'strongadmin/logout', 'strongadmin/captcha'];

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
        return $this->ignore_auth_url;
    }

}
