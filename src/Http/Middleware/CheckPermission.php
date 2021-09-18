<?php

namespace OpenStrong\StrongAdmin\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use OpenStrong\StrongAdmin\Models\AdminRole;

/**
 * 权限检测
 */
class CheckPermission extends Auth
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
        if (!$this->checkPermission($request))
        {
            if ($request->ajax() || $request->pjax())
            {
                return response()->json(['code' => 403, 'message' => '暂无权限']);
            }
            return abort(403, '暂无权限');
        }
        return $next($request);
    }

    protected function checkPermission($request)
    {
        $current_route_url = $this->getCurrentRouteUrl($request);
        if (in_array($current_route_url, $this->getIgnoreUrl()))
        {
            return true;
        }
        $user = auth()->guard(config('strongadmin.guard'))->user();
        if ($user->id == 1)
        {
            //超级管理员角色
            return true;
        }
        //获取角色对应的route_url
        $roleModel = AdminRole::find($user->roles->pluck('id'));
        if (!$roleModel)
        {
            return false;
        }
        $permissionsMenuUrl = [];
        foreach ($roleModel as $perm)
        {
            $permissionsMenuUrl = array_merge_recursive($permissionsMenuUrl, $perm['permissions']['menu_route_url'] ?? []);
        }
        if (!in_array($current_route_url, $permissionsMenuUrl))
        {
            return false;
        }
        return true;
    }

    protected function getCurrentRouteUrl($request)
    {
        $current_route_url = Route::current()->uri;
        return $current_route_url;
    }

    protected function getIgnoreUrl()
    {
        return parent::getIgnoreUrl();
    }

}
