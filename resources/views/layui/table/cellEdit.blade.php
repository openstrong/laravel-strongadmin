<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/vendor/strongadmin/plugins/layui/css/layui.css"><link rel="stylesheet" href="/vendor/strongadmin/plugins/layui/css/global.css">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
 
<table class="layui-table" lay-data="{url:'/test/table/demo1.json', id:'test3', escape: true}" lay-filter="test3">
  <thead>
    <tr>
      <th lay-data="{type:'checkbox'}">ID</th>
      <th lay-data="{field:'id', width:80, sort: true}">ID</th>
      <th lay-data="{field:'username', width:120, sort: true, edit: 'text'}">用户名</th>
      <th lay-data="{field:'email', edit: 'text', minWidth: 150}">邮箱</th>
      <th lay-data="{field:'sex', width:80, edit: 'text'}">性别</th>
      <th lay-data="{field:'city', edit: 'text', minWidth: 100}">城市</th>
      <th lay-data="{field:'experience', sort: true, edit: 'text'}">积分</th>
    </tr>
  </thead>
</table>
              
          
<script src="/vendor/strongadmin/plugins/layui/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
<script>
layui.use(['table', 'util'], function(){
  var table = layui.table
  ,util = layui.util;
  
  //监听单元格编辑
  table.on('edit(test3)', function(obj){
    var value = obj.value //得到修改后的值
    ,data = obj.data //得到所在行所有键值
    ,field = obj.field; //得到字段
    layer.msg('[ID: '+ data.id +'] ' + field + ' 字段更改值为：'+ util.escape(value));
  });
});
</script>

</body>
</html>