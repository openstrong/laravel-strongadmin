#### 接口版本：

|版本号|制定人|修订日期|说明|
|:----|:----|:----   |:----|
|1.0 |Karen  |2021-10-22 |建立文档|

#### 请求URL:

- {{HOST}}/strongadmin/adminUser/index

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
|page |否  |integer |第几页, 如果是 -1 表示不分页   |
|user_name |否  |string |登录名   |
|password |否  |string |登录密码   |
|name |否  |string |姓名   |
|email |否  |string |邮箱   |
|phone |否  |string |手机号   |
|avatar |否  |string |头像   |
|introduction |否  |string |介绍   |
|status |否  |integer |状态 1 启用, 2 禁用   |
|last_ip |否  |string |最近一次登录ip   |
|last_at |否  |date |最近一次登录时间   |
|created_at_begin |否  |date |CREATED_AT 开始日期   |
|created_at_end |否  |date |CREATED_AT 结束日期   |

#### 返回示例:

**正确时返回:**

```
{
    "code": 200,
    "message": "common.Success",
    "data": {
        "data": [
            {
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
            },
            {
                "id": 2,
                "user_name": "demo",
                "name": "",
                "email": "",
                "phone": "",
                "avatar": "",
                "introduction": "",
                "status": 1,
                "last_ip": "",
                "last_at": "",
                "created_at": "",
                "updated_at": ""
            }
        ],
        "current_page": 1, //当前页
        "last_page": 1, //末页/总页数
        "per_page": 15, //每页条数
        "total": 5 //数据总条数
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