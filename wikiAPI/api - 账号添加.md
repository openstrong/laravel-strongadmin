#### 接口版本：

|版本号|制定人|修订日期|说明|
|:----    |:---|-----   ||
|1.0 |Karen  |2021-10-22 |建立文档|

#### 请求URL:

- {{HOST}}/strongadmin/adminUser/create

#### 请求方式：

- POST

#### 请求头：

|参数名|是否必须|类型|说明|
|:----    |:---|:----- |-----   |
|Content-Type |是  |string |application/json   |
|Accept |是  |string |application/json   |

#### 请求参数:

|参数名|是否必须|类型|说明|
|:----    |:---|:----- |-----   |
|user_name |是  |string |登录名   |
|password |否  |string |登录密码   |
|remember_token |否  |string |记住登录   |
|name |否  |string |姓名   |
|email |否  |string |邮箱   |
|phone |否  |string |手机号   |
|avatar |否  |string |头像   |
|introduction |否  |string |介绍   |
|status |是  |integer |状态 1 启用, 2 禁用   |

#### 返回示例:

**正确时返回:**

```
{
    "code": 200,
    "message": "common.Success",
    "data": {
        "id": 1, //管理员id
        "user_name": "admin", //登录名
        "name": "", //姓名
        "email": "", //邮箱
        "phone": "", //手机号
        "avatar": "", //头像
        "introduction": "", //介绍
        "status": 1, //状态 1 启用, 2 禁用
        "last_ip": "127.0.0.1", //最近一次登录ip
        "last_at": "2021-10-21 07:17:35", //最近一次登录时间
        "created_at": "", //
        "updated_at": "2021-10-21 07:17:35" //
    }
}
```

#### 返回CODE说明:

|参数名|说明|
|:----- |----- |
|200 |成功  |
|3001 |字段验证错误  |
|5001|服务内部错误|

#### 备注:

- 更多返回错误代码请看首页的错误代码描述