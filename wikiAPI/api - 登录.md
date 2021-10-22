#### 接口版本：

|版本号|制定人|修订日期|说明|
|:----|:----|:----   |:----|
|1.0 |Karen  |2021-10-22 |建立文档|

#### 请求URL:

- {{HOST}}/strongadmin/login

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
|username |是  |string |登录名   |
|password |是  |string |登录密码   |
|captcha_key |是  |string |验证码key （api - 登录-图片验证码）  |
|captcha |是  |string |验证码   |

#### 返回示例:

**正确时返回:**

```
{
    "code": 200,
    "message": "登录成功.",
    "data": {
        // 登录token，放在 header 头使用，参数名： Authorization
        "token": "Bearer ST.zgM7ukzA4ri1BqnjMGHZGmrwgLZkElHD.1634900732.2342",//登录token
        "adminUser": {
            "id": 1,
            "user_name": "admin",
            "name": "",
            "email": "",
            "phone": "",
            "avatar": "",
            "introduction": "",
            "status": 1,
            "last_ip": "127.0.0.1",
            "last_at": "2021-10-22 11:05:32",
            "created_at": null,
            "updated_at": "2021-10-22 11:05:32",
            //角色信息
            "roles": [
                {
                    "id": 1,
                    "name": "管理员",
                    "pivot": {
                        "admin_user_id": 1,
                        "admin_role_id": 1
                    }
                }
            ]
        }
    },
    "log": "登录成功:admin",
    "toUrl": "http://www.strongadmin.local/strongadmin"
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