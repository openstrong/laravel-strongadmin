#### 使用api开发，请在项目根目录的 `.env` 文件增加如下配置：
```
STRONGADMIN_GUARDS_DRIVER=token
```

#### 配合前端项目开发
推荐使用 [vue-element-admin](https://panjiachen.gitee.io/vue-element-admin-site/zh/)
#### 接口规范
>接口使用JSON数据交换格式, 易于阅读和编写且在各平台兼容性较好 

##### 返回数据格式定义
|键名|释义|
|:----    |:-------    |
|code|返回code值,200代表操作成功|
|message|Code值描述|
|data|返回数据对象|

##### 示例:
```json
{
    "code":200,
    "message":"success",
    "data":{
        "id":1,
        "name":"张三"
    }
}
```

##### Code值含义统一定义
|Code值|	含义|
|:----    |:-------    |
|200|	操作成功|
|401|未登录|
|403|无权限|
|429|接口请求太过频繁|
|431|token expired 已过期|
|432|token must be refreshed 请刷新token|
|3000+|	字段验证错误|
|4000+|	业务逻辑错误|
|5000+|	服务器错误|