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

安装 Telescope 后，可以在 Artisan 使用 `strongadmin:install` 命令来配置扩展实例。安装 laravel-strongadmin 后，还应运行  `migrate` 命令：
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

禁用和启用 laravel-strongadmin
```
'enabled' => env('STRONGADMIN_ENABLED', true),
```
