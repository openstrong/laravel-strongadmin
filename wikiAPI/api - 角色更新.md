#### 接口版本：

|版本号|制定人|修订日期|说明|
|:----|:----|:----   |:----|
|1.0 |Karen  |2021-10-25 |建立文档|

#### 请求URL:

- {{HOST}}/strongadmin/adminRole/update

#### 请求方式：

- POST

#### 请求头：

|参数名|是否必须|类型|说明|
|:----    |:---|:----- |-----   |
|Content-Type |是  |string |application/json   |
|Accept |是  |string |application/json   |
|Authorization|是|string|{token}|

#### 请求参数:

|参数名|是否必须|类型|说明|
|:----    |:---|:----- |-----   |
|id |是  |integer |角色id   |
|name |是  |string |名称   |
|desc |否  |string |角色描述   |
|permissions |否  |string |拥有的权限   |


#### 返回示例:

**正确时返回:**

```
{
    "code": 200,
    "message": "common.Success",
    "data": {
        "id": 1, //角色id
        "name": "管理员", //名称
        "desc": "超级管理员，不可删除", //角色描述
        "permissions": "", //拥有的权限
        "created_at": "", //
        "updated_at": "" //
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