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
Route::any('/', 'IndexController@home')->name('strongadmin.home'); //home 主页
Route::any('userinfo', 'AdminAuthController@userinfo'); //管理员信息
Route::any('index/panel', 'IndexController@panel')->name('strongadmin.panel'); //面板
//操作日志
Route::any('adminLog/index', 'AdminLogController@index');
Route::any('adminLog/destroy', 'AdminLogController@destroy');
//菜单管理
Route::any('adminMenu/index', 'AdminMenuController@index');
Route::any('adminMenu/show', 'AdminMenuController@show');
Route::any('adminMenu/create', 'AdminMenuController@create');
Route::any('adminMenu/update', 'AdminMenuController@update');
Route::any('adminMenu/destroy', 'AdminMenuController@destroy');
//角色管理
Route::any('adminRole/index', 'AdminRoleController@index');
Route::any('adminRole/show', 'AdminRoleController@show');
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
//Layui
Route::any('layui/{name}', function ($name) {
    return view("strongadmin::layui.{$name}");
});
Route::any('layui/demo/table/{name}.html', function ($name) {
    return view("strongadmin::layui.table/{$name}");
});
Route::any('layui/demo/table/user', function () {
    return '{"code":0,"msg":"","count":1000,"data":[{"id":10000,"username":"user-0","sex":"女","city":"城市-0","sign":"签名-0","experience":255,"logins":24,"wealth":82830700,"classify":"作家","score":57},{"id":10001,"username":"user-1","sex":"男","city":"城市-1","sign":"签名-1","experience":884,"logins":58,"wealth":64928690,"classify":"词人","score":27},{"id":10002,"username":"user-2","sex":"女","city":"城市-2","sign":"签名-2","experience":650,"logins":77,"wealth":6298078,"classify":"酱油","score":31},{"id":10003,"username":"user-3","sex":"女","city":"城市-3","sign":"签名-3","experience":362,"logins":157,"wealth":37117017,"classify":"诗人","score":68},{"id":10004,"username":"user-4","sex":"男","city":"城市-4","sign":"签名-4","experience":807,"logins":51,"wealth":76263262,"classify":"作家","score":6},{"id":10005,"username":"user-5","sex":"女","city":"城市-5","sign":"签名-5","experience":173,"logins":68,"wealth":60344147,"classify":"作家","score":87},{"id":10006,"username":"user-6","sex":"女","city":"城市-6","sign":"签名-6","experience":982,"logins":37,"wealth":57768166,"classify":"作家","score":34},{"id":10007,"username":"user-7","sex":"男","city":"城市-7","sign":"签名-7","experience":727,"logins":150,"wealth":82030578,"classify":"作家","score":28},{"id":10008,"username":"user-8","sex":"男","city":"城市-8","sign":"签名-8","experience":951,"logins":133,"wealth":16503371,"classify":"词人","score":14},{"id":10009,"username":"user-9","sex":"女","city":"城市-9","sign":"签名-9","experience":484,"logins":25,"wealth":86801934,"classify":"词人","score":75}]}';
});
Route::any('layui/demo/table/edit', function () {
    return '{
  "code": 0
  ,"msg": ""
  ,"count": 3000000
  ,"data": [{
    "id": "10001"
    ,"username": "杜甫"
    ,"email": "test@email.com"
    ,"sex": "男"
    ,"city": "浙江杭州"
    ,"sign": "点击此处，显示更多。当内容超出时，点击单元格会自动显示更多内容。"
    ,"experience": "116"
    ,"ip": "192.168.0.8"
    ,"logins": "108"
    ,"joinTime": "2016-10-14"
  }, {
    "id": "10002"
    ,"username": "李白"
    ,"email": "test@email.com"
    ,"sex": "男"
    ,"city": "浙江杭州"
    ,"sign": "君不见，黄河之水天上来，奔流到海不复回。 君不见，高堂明镜悲白发，朝如青丝暮成雪。 人生得意须尽欢，莫使金樽空对月。 天生我材必有用，千金散尽还复来。 烹羊宰牛且为乐，会须一饮三百杯。 岑夫子，丹丘生，将进酒，杯莫停。 与君歌一曲，请君为我倾耳听。(倾耳听 一作：侧耳听) 钟鼓馔玉不足贵，但愿长醉不复醒。(不足贵 一作：何足贵；不复醒 一作：不愿醒/不用醒) 古来圣贤皆寂寞，惟有饮者留其名。(古来 一作：自古；惟 通：唯) 陈王昔时宴平乐，斗酒十千恣欢谑。 主人何为言少钱，径须沽取对君酌。 五花马，千金裘，呼儿将出换美酒，与尔同销万古愁。"
    ,"experience": "12"
    ,"ip": "192.168.0.8"
    ,"logins": "106"
    ,"joinTime": "2016-10-14"
    ,"LAY_CHECKED": true
  }, {
    "id": "10003"
    ,"username": "王勃"
    ,"email": "test@email.com"
    ,"sex": "男"
    ,"city": "浙江杭州"
    ,"sign": "人生恰似一场修行"
    ,"experience": "65"
    ,"ip": "192.168.0.8"
    ,"logins": "106"
    ,"joinTime": "2016-10-14"
  }, {
    "id": "10004"
    ,"username": "李清照"
    ,"email": "test@email.com"
    ,"sex": "女"
    ,"city": "浙江杭州"
    ,"sign": "人生恰似一场修行"
    ,"experience": "666"
    ,"ip": "192.168.0.8"
    ,"logins": "106"
    ,"joinTime": "2016-10-14"
  }, {
    "id": "10005"
    ,"username": "冰心"
    ,"email": "test@email.com"
    ,"sex": "女"
    ,"city": "浙江杭州"
    ,"sign": "人生恰似一场修行"
    ,"experience": "86"
    ,"ip": "192.168.0.8"
    ,"logins": "106"
    ,"joinTime": "2016-10-14"
  }, {
    "id": "10006"
    ,"username": "贤心"
    ,"email": "test@email.com"
    ,"sex": "男"
    ,"city": "浙江杭州"
    ,"sign": "人生恰似一场修行"
    ,"experience": "12"
    ,"ip": "192.168.0.8"
    ,"logins": "106"
    ,"joinTime": "2016-10-14"
  }, {
    "id": "10007"
    ,"username": "贤心"
    ,"email": "test@email.com"
    ,"sex": "男"
    ,"city": "浙江杭州"
    ,"sign": "人生恰似一场修行"
    ,"experience": "16"
    ,"ip": "192.168.0.8"
    ,"logins": "106"
    ,"joinTime": "2016-10-14"
  }, {
    "id": "10008"
    ,"username": "贤心"
    ,"email": "test@email.com"
    ,"sex": "男"
    ,"city": "浙江杭州"
    ,"sign": "人生恰似一场修行"
    ,"experience": "106"
    ,"ip": "192.168.0.8"
    ,"logins": "106"
    ,"joinTime": "2016-10-14"
  }]
}  ';
});
