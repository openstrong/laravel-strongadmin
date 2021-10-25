#### 接口版本：

|版本号|制定人|修订日期|说明|
|:----|:----|:----   |:----|
|1.0 |Karen  |2021-10-22 |建立文档|

#### 请求URL:

- {{HOST}}/strongadmin/adminLog/index

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
|route_url |否  |string |路由   |
|desc |否  |string |操作描述   |
|admin_user_id |否  |integer |操作用户   |
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
                "id": 1, //
                "route_url": "/strongadmin/login", //路由
                "desc": "登录成功:admin", //操作描述
                "log_original": "", //字段变更前内容
                "log_dirty": "", //字段变更后内容
                "admin_user_id": 1, //操作用户
                "created_at": "2021-09-27 05:33:24", //
                "updated_at": "2021-09-27 05:33:24" //
            },
            {
                "id": 2,
                "route_url": "/strongadmin/login",
                "desc": "登录密码错误：admin",
                "log_original": "",
                "log_dirty": "",
                "admin_user_id": 0,
                "created_at": "2021-10-21 02:50:55",
                "updated_at": "2021-10-21 02:50:55"
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