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
      | StrongAdmin 数据库配置
      |--------------------------------------------------------------------------
      |
      | 在这可以自定义 StrongAdmin 数据库连接的数据库；修改默认 后台超级管理员 账号信息
      |
     */
    'storage' => [
        //数据库
        'database' => [
            'connection' => env('DB_CONNECTION', 'mysql'), //数据库连接
        ],
        //后台超级管理员
        'super_admin' => [
            'user_name' => 'admin', //账号名称
            'password' => '123456', //账号密码
        ],
        //登录限制
        'throttles_logins' => [
            'maxAttempts' => 5, //允许尝试登录最大次数
            'decayMinutes' => 10, //登录错误超过 maxAttempts 次, 禁止登录 decayMinutes 分钟
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
      | StrongAdmin Auth Guard 看守器名称
      |--------------------------------------------------------------------------
      | 使用案例：auth('admin')->user(), auth('admin')->id()
     */
    'guard' => 'admin',
    
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
