#### 接口版本：

|版本号|制定人|修订日期|说明|
|:----|:----|:----   |:----|
|1.0 |Karen  |2021-10-22 |建立文档|

#### 请求URL:

- {{HOST}}/strongadmin/userinfo

#### 请求方式：

- GET

#### 请求头：

|参数名|是否必须|类型|说明|
|:----    |:---|:----- |-----   |
|Content-Type |是  |string |application/json   |
|Accept |是  |string |application/json   |
|Authorization|是|string|{token}|

#### 搜索参数:

|参数名|是否必须|类型|说明|
|:----    |:---|:----- |-----   |

#### 返回示例:

**正确时返回:**

```
{
    "code": 200,
    "message": "success",
    "data": {
        "id": 1,
        "user_name": "admin",
        "name": "",
        "email": "",
        "phone": "",
        "avatar": "",
        "introduction": "",
        "status": 1,
        "last_ip": "127.0.0.1",
        "last_at": "2021-10-22 11:23:21",
        "created_at": null,
        "updated_at": "2021-10-22 11:23:21",
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
}
```

#### 返回CODE说明:

|参数名|说明|
|:----- |----- |
|200 |成功  |
|5001|服务内部错误|

#### 备注:

- 更多返回错误代码请看首页的错误代码描述