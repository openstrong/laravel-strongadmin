<?php

namespace OpenStrong\StrongAdmin\Http\Controllers;

use Illuminate\Http\Request;
use OpenStrong\StrongAdmin\Models\AdminMenu;
use OpenStrong\StrongAdmin\Models\AdminRole;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{

    /**
     * 后台home主页
     * @return type
     */
    public function home()
    {
        $default_url = route('strongadmin.panel', [], false); //默认加载页面

        $roleModel = AdminRole::find(auth(config('strongadmin.guard'))->user()->roles->pluck('id'));
        if (!$roleModel)
        {
            return $this->view('index.home', ['rows' => []]);
        }
        $permissionsMenuId = [];
        foreach ($roleModel as $perm)
        {
            $permissionsMenuId = array_merge_recursive($permissionsMenuId, $perm['permissions']['menu_id'] ?? []);
        }
        $rows = AdminMenu::query()
                ->orderByDesc('sort')
                ->where('status', 1)->where('level', 1)
                ->with(['children' => function ($query) {
                        $query->where('status', 1);
                    }])
                ->get();

        //如果不是超级管理员
        if (auth(config('strongadmin.guard'))->user()->id !== 1)
        {
            //过滤无权限菜单
            $datas = $rows->filter(function ($item)use ($permissionsMenuId) {
                        $children = $item->children->filter(function ($it)use ($permissionsMenuId, $item) {
                            return in_array($it->id, $permissionsMenuId);
                        });
                        unset($item->children);
                        $item->children = $children;
                        return $children->count() > 0;
                    })->values();
        } else
        {
            $datas = $rows;
        }
        $default_url = $datas[0]['children'][0]['route_url'] ?? $default_url;
        return $this->view('index.home', ['rows' => $datas, 'default_url' => $default_url]);
    }

    /**
     * 面板
     * @return type
     */
    public function panel()
    {
        return $this->view('index.panel');
    }

    public function captcha()
    {
        return \Captcha::create(); //图片验证码 
    }
}
