#### 接口版本：

|版本号|制定人|修订日期|说明|
|:----|:----|:----   |:----|
|1.0 |Karen  |2021-10-22 |建立文档|

#### 请求URL:

- {{HOST}}/strongadmin/adminUser/destroy

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
|id |是  |array |管理员id   |

#### 返回示例:

**正确时返回:**

```
{
    "code": 200,
    "message": "common.Success",
}
```

#### 返回CODE说明:

|参数名|说明|
|:----- |----- |
|200 |成功  |
|5001|服务内部错误|

#### 备注:

- 更多返回错误代码请看首页的错误代码描述
