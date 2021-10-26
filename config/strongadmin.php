<?php

return [
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
        config('auth.guards.strongadmin.driver') == 'session' ? 'web' : 'api',
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
    
];
