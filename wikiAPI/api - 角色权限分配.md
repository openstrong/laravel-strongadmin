#### 接口版本：

|版本号|制定人|修订日期|说明|
|:----|:----|:----   |:----|
|1.0 |Karen  |2021-10-25 |建立文档|

#### 请求URL:

- {{HOST}}/strongadmin/adminRole/assignPermissions

#### 请求方式：

- POST

#### 请求头：

|参数名|是否必须|类型|说明|
|:----    |:---|:----- |-----   |
|Content-Type |是  |string |application/json   |
|Accept |是  |string |application/json   |
|Authorization|是|string|{token}|

#### 请求参数:

```
{
    "checkedData": [
        {
            "id": "1",
            "title": "权限管理",
            "route_url": null,
            "children": [
                {
                    "id": "2",
                    "title": "菜单管理",
                    "route_url": "strongadmin/adminMenu/index",
                    "children": [
                        {
                            "id": "3",
                            "title": "列表查看",
                            "route_url": "strongadmin/adminMenu/index"
                        }
                    ]
                }
            ]
        }
    ]
}
```


#### 返回示例:

**正确时返回:**

```
{
    "code": 200,
    "message": "common.Success"
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