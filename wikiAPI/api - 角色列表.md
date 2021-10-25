#### 接口版本：

|版本号|制定人|修订日期|说明|
|:----|:----|:----   |:----|
|1.0 |Karen  |2021-10-25 |建立文档|

#### 请求URL:

- {{HOST}}/strongadmin/adminRole/index

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
|name |否  |string |名称   |
|desc |否  |string |角色描述   |
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
                "id": 1, //角色id
                "name": "管理员", //名称
                "desc": "超级管理员，不可删除", //角色描述
                "permissions": "", //拥有的权限
                "created_at": "", //
                "updated_at": "" //
            },
            {
                "id": 2,
                "name": "demo",
                "desc": "仅作为演示",
                "permissions": "",
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