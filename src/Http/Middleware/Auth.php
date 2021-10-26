<?php

namespace OpenStrong\StrongAdmin\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use OpenStrong\StrongAdmin\Repositories\AppRepository;

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
            if (AppRepository::isWeb())
            {
                return redirect(route('strongadmin.login'));
            } else
            {
                return response()->json(['code' => 401, 'msg' => '请登录']);
            }
        }
        if (AppRepository::isApi())
        {
            $user = auth(config('strongadmin.guard'))->user();
            if ($user->api_token_at && now()->gte($user->api_token_at))
            {
                return response()->json(['code' => 431, 'message' => __('token expired 已过期')]);
            }
            if ($user->api_token_refresh_at && now()->gte($user->api_token_refresh_at))
            {
                //return response()->json(['code' => 432, 'message' => __('token must be refreshed 请刷新token')]);
            }
        }
        return $next($request);
    }

    protected function getIgnoreUrl()
    {
        return config('strongadmin.ignore_auth_check_url');
    }

}
