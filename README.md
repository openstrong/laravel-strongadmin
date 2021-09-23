# larevel-strongadmin
在回车一瞬间构建一个功能齐全的管理后台

基于 layui 前端框架开发的 Laravel 后台管理框架。功能如下：
- 权限管理
- 菜单管理
- 角色管理
- 日志记录
- 管理员账号

## 安装
你可以使用 Composer 在 Laravel 项目中安装 laravel-strongadmin 扩展：
```
composer require openstrong/laravel-strongadmin
```

安装 laravel-strongadmin 后，可以在 Artisan 使用 `strongadmin:install` 命令来配置扩展实例。安装 laravel-strongadmin 后，还应运行  `migrate` 命令：
```
php artisan strongadmin:install

php artisan migrate
```

## 更新 laravel-strongadmin
更新 laravel-strongadmin 时，您应该重新配置加载 laravel-strongadmin 实例：
```
php artisan strongadmin:publish
```


# 浏览
http://xxx.com/strongadmin
```
后台登录账号：admin
后台登录密码：123456
```

## 配置
使用 laravel-strongadmin，其主要配置文件将位于 config/strongadmin.php。此配置文件允许您配置监听程序选项，每个配置选项都包含其用途说明，因此请务必彻底浏览此文件。

```
/*
  |--------------------------------------------------------------------------
  | 启用 StrongAdmin
  |--------------------------------------------------------------------------
 */
'enabled' => env('STRONGADMIN_ENABLED', true),

/*
  |--------------------------------------------------------------------------
  | StrongAdmin 子域名
  |--------------------------------------------------------------------------
  |
  | 设置后即可支持域名访问
  |
 */
'domain' => env('STRONGADMIN_DOMAIN', null),

/*
  |--------------------------------------------------------------------------
  | StrongAdmin Path
  |--------------------------------------------------------------------------
  |
  | StrongAdmin 访问路径（也是路由前缀），如果修改此项，请记得修改以下配置 `ignore_auth_check_url`、`ignore_permission_check_url`
  |
 */
'path' => env('STRONGADMIN_PATH', 'strongadmin'),

/*
  |--------------------------------------------------------------------------
  | StrongAdmin 数据配置
  |--------------------------------------------------------------------------
  |
  | 1.在这可以自定义 StrongAdmin 数据库连接的数据库
  | 2.修改默认 后台超级管理员 账号信息（仅安装初始化有效）
  | 3.修改图片验证码配置
  |
 */
'storage' => [
    //数据库
    'database' => [
        'connection' => env('DB_CONNECTION', 'mysql'), //数据库连接
    ],
    //后台超级管理员（仅安装初始化有效）
    'super_admin' => [
        'user_name' => 'admin', //账号名称
        'password' => '123456', //账号密码
    ],
    //登录限制
    'throttles_logins' => [
        'maxAttempts' => 5, //允许尝试登录最大次数
        'decayMinutes' => 10, //登录错误超过 maxAttempts 次, 禁止登录 decayMinutes 分钟
    ],
    //图片验证码
    'captcha'=>[
        'length' => 4, //字符长度
        'width' => 120, //宽
        'height' => 44, //高
        'expire' => 60, //有效期 秒
    ],
],

/*
  |--------------------------------------------------------------------------
  | StrongAdmin 中间件
  |--------------------------------------------------------------------------
  |
 */
'middleware' => [
    'web',
    OpenStrong\StrongAdmin\Http\Middleware\Auth::class, //登录认证检测
    OpenStrong\StrongAdmin\Http\Middleware\CheckPermission::class, //权限检测
    OpenStrong\StrongAdmin\Http\Middleware\Log::class, //日志记录
],

/*
  |--------------------------------------------------------------------------
  | StrongAdmin Auth Guard 登录认证看守器名称。不建议修改此项，如果修改此项则必须修改相对应的 `config/auth.php` 里的 `guards` 配置项
  |--------------------------------------------------------------------------
  | auth('strongadmin')->user() --- 获取登录用户信息
  | auth('strongadmin')->id()   --- 获取登录用户id
 */
'guard' => 'strongadmin',

/*
  |--------------------------------------------------------------------------
  | 忽略登录检测的路由
  |--------------------------------------------------------------------------
 */
'ignore_auth_check_url' => ['strongadmin/login', 'strongadmin/logout', 'strongadmin/captcha'],

/*
  |--------------------------------------------------------------------------
  | 忽略权限检测的路由
  |--------------------------------------------------------------------------
 */
'ignore_permission_check_url' => ['strongadmin'],
```

# 开发

### 新增控制器
`app/Http/Controllers/StrongAdmin/AdminUserController`

这里一定要继承控制器 '\OpenStrong\StrongAdmin\Http\Controllers\BaseController'
```
use
class AdminUserController extends \OpenStrong\StrongAdmin\Http\Controllers\BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StrongadminUser  $strongadminUser
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, StrongadminUser $strongadminUser)
    {
        if (!$request->expectsJson())
        {
            return $this->view('adminUser.index', ['model' => $strongadminUser]);
        }
        $model = StrongadminUser::orderBy(($request->field ?: 'id'), ($request->order ?: 'desc'));
        if ($request->user_name) {
            $model->where('user_name', 'like', "%{$request->user_name}%");
        }
        if ($request->created_at_begin && $request->created_at_end) {
            $model->whereBetween('created_at', [$request->created_at_begin, Carbon::parse($request->created_at_end)->endOfDay()]);
        }
        if((isset($request->page) && $request->page <= 0) || $request->export){
            $rows = $model->get();
        }else{
            $rows = $model->paginate($request->limit);
        }
        //$rows->makeHidden(['deleted_at']);
        return ['code' => 200, 'message' => __('admin.Success'), 'data' => $rows];
    }
}
```

### 新增路由
```
Route::middleware(['strongadmin'])->group(function() {
    Route::any('strongadmin/product/index', 'StrongAdmin\AdminUserController@index');
});
```

### 新增视图 
`resources/views/strongadmin/adminUser/index.blade.php`

这里一定要继承视图模板 `strongadmin::layouts.app`
```
@extends('strongadmin::layouts.app')
@push('styles')
<style></style>
@endpush
@push('scripts')
<script></script>
@endpush
@section('content')
<div class="st-h15"></div>
<form class="layui-form st-form-search" lay-filter="ST-FORM-SEARCH">
    <div class="layui-form-item"><div class="layui-inline">
            <label class="layui-form-label">{{$model->getAttributeLabel('user_name')}}</label>
            <div class="layui-input-inline">
                <input type="text" name="user_name" autocomplete="off" placeholder="" class="layui-input">
            </div>
        </div><div class="layui-inline">
            <label class="layui-form-label">{{$model->getAttributeLabel('password')}}</label>
            <div class="layui-input-inline">
                <input type="text" name="password" autocomplete="off" placeholder="" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">{{$model->getAttributeLabel('created_at')}}</label>
            <div class="layui-input-inline">
                <input type="text" name="created_at_begin" id="date" placeholder="年-月-日" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline">
                <input type="text" name="created_at_end" id="date2" placeholder="年-月-日" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <a class="layui-btn layui-btn-xs st-search-button">开始搜索</a>
        </div>
    </div>
</form>
<table class="layui-hide" id="ST-TABLE-LIST" lay-filter="ST-TABLE-LIST"></table>
<script type="text/html" id="ST-TOOL-BAR">
    <div class="layui-btn-container st-tool-bar">
        <a class="layui-btn layui-btn-xs" onclick="Util.createFormWindow('/strongadmin/adminUser/create', this.innerText);">添加</a>
        <a class="layui-btn layui-btn-xs" lay-event="batchDelete" data-href="/strongadmin/adminUser/destroy">删除选中</a>
    </div>
</script>
<script type="text/html" id="ST-OP-BUTTON">
    @verbatim
    <a class="layui-btn layui-btn-xs" onclick="Util.createFormWindow('/strongadmin/adminUser/update?id={{d.id}}', this.innerText);">更新</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" onclick="Util.destroy('/strongadmin/adminUser/destroy?id={{d.id}}');">删除</a>
    @endverbatim
</script>
@endsection
@push('scripts_bottom')        
<script>
!function () {
    //日期
    layui.laydate.render({
        elem: '#date'
    });
    layui.laydate.render({
        elem: '#date2'
    });
    //表格字段
    var cols = [
                {type: 'checkbox', fixed: 'left'}
                , {field: 'id', title: 'id', width: 60, fixed: 'left', unresize: true, totalRowText: '合计', sort: true}
                , {field: 'user_name', title: '{{$model->getAttributeLabel("user_name")}}', width: 150, sort: true}
                , {field: 'password', title: '{{$model->getAttributeLabel("password")}}', width: 150, sort: true}
                , {field: 'remember_token', title: '{{$model->getAttributeLabel("remember_token")}}', width: 150, sort: true}
                , {field: 'name', title: '{{$model->getAttributeLabel("name")}}', width: 150, sort: true}
                , {field: 'email', title: '{{$model->getAttributeLabel("email")}}', width: 150, sort: true}
                , {field: 'phone', title: '{{$model->getAttributeLabel("phone")}}', width: 150, sort: true}
                , {field: 'avatar', title: '{{$model->getAttributeLabel("avatar")}}', width: 150, sort: true}
                , {field: 'introduction', title: '{{$model->getAttributeLabel("introduction")}}', width: 150, sort: true}
                , {field: 'status', title: '{{$model->getAttributeLabel("status")}}', width: 150, sort: true}
                , {field: 'last_ip', title: '{{$model->getAttributeLabel("last_ip")}}', width: 150, sort: true}
                , {field: 'last_at', title: '{{$model->getAttributeLabel("last_at")}}', width: 150, sort: true}
                , {field: 'created_at', title: '{{$model->getAttributeLabel("created_at")}}', width: 150, sort: true}
                , {field: 'updated_at', title: '{{$model->getAttributeLabel("updated_at")}}', width: 150, sort: true}
                , {fixed: 'right', title: '操作', toolbar: '#ST-OP-BUTTON', width: 150}
            ];
    var tableConfig = {
        cols: [cols]
    };
    Util.renderTable(tableConfig);
}();
</script>
@endpush
```

# 重构

这里以重构 admin 登录为例

1. 重构控制器
新建 app/Http/Controllers/StrongAdmin/AdminAuthController

    ```
    class AdminAuthController extends \OpenStrong\StrongAdmin\Http\Controllers\AdminAuthController
    {
        public function login(Request $request)
        {

        }
    }
    ```

2. 重构路由
    ```
    Route::middleware(['strongadmin'])->group(function() {
        Route::any('strongadmin/login', 'StrongAdmin\AdminAuthController@login');
    });
    ```