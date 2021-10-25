#### 接口版本：

|版本号|制定人|修订日期|说明|
|:----|:----|:----   |:----|
|1.0 |Karen  |2021-10-22 |建立文档|

#### 请求URL:

- {{HOST}}/strongadmin/adminMenu/index

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
|level |否  |integer |等级 1 一级菜单, 2 二级菜单, 3 三级菜单   |
|parent_id |否  |integer |上级菜单   |
|name |否  |string |菜单名称   |
|route_url |否  |string |菜单跳转地址   |
|status |否  |integer |状态 1开启,2禁用   |
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
                "id": 1, //菜单id
                "level": 1, //等级 1 一级菜单, 2 二级菜单, 3 三级菜单
                "parent_id": 0, //上级菜单
                "name": "权限管理", //菜单名称
                "route_url": "", //菜单跳转地址
                "status": 1, //状态 1开启,2禁用
                "sort": 2001, //排序
                "created_at": "2021-01-06 03:37:40", //
                "updated_at": "2021-05-21 20:10:57", //
                "delete_allow": 2 //是否允许删除：1 允许，2 不允许
            },
            {
                "id": 2,
                "level": 2,
                "parent_id": 1,
                "name": "菜单管理",
                "route_url": "strongadmin/adminMenu/index",
                "status": 1,
                "sort": 200,
                "created_at": "2021-01-06 03:38:18",
                "updated_at": "2021-09-18 03:06:27",
                "delete_allow": 2
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