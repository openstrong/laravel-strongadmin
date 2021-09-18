<?php

use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | StrongAdmin Routes
  |--------------------------------------------------------------------------
  |
 */
Route::any('captcha', 'IndexController@captcha')->name('strongadmin.captcha'); //图片验证码
Route::any('login', 'AdminAuthController@login')->name('strongadmin.login'); //登录
Route::any('logout', 'AdminAuthController@logout')->name('strongadmin.logout'); //退出
Route::any('home', 'IndexController@home')->name('strongadmin.home'); //home 主页
Route::any('index/panel', 'IndexController@panel')->name('strongadmin.panel'); //面板
//操作日志
Route::any('adminLog/index', 'AdminLogController@index');
Route::any('adminLog/destroy', 'AdminLogController@destroy');
//菜单管理
Route::any('adminMenu/index', 'AdminMenuController@index');
Route::any('adminMenu/create', 'AdminMenuController@create');
Route::any('adminMenu/update', 'AdminMenuController@update');
Route::any('adminMenu/destroy', 'AdminMenuController@destroy');
//角色管理
Route::any('adminRole/index', 'AdminRoleController@index');
Route::any('adminRole/create', 'AdminRoleController@create');
Route::any('adminRole/update', 'AdminRoleController@update');
Route::any('adminRole/destroy', 'AdminRoleController@destroy');
Route::any('adminRole/assignPermissions', 'AdminRoleController@assignPermissions');
//账号管理
Route::any('adminUser/index', 'AdminUserController@index');
Route::any('adminUser/show', 'AdminUserController@show');
Route::any('adminUser/create', 'AdminUserController@create');
Route::any('adminUser/update', 'AdminUserController@update');
Route::any('adminUser/destroy', 'AdminUserController@destroy');
