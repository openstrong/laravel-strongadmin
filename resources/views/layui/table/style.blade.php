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
 
<table class="layui-table" lay-data="{height:305, url:'/strongadmin/layui/demo/table/user', page:true, id:'test2', skin: 'row', even: true}">
  <thead>
    <tr>
      <th lay-data="{field:'id', width:80, sort: true}">ID</th>
      <th lay-data="{field:'username', width:80, templet: '#usernameTpl'}">用户名</th>
      <th lay-data="{field:'sex', width:80, sort: true, templet: '#sexTpl'}">性别</th>
      <th lay-data="{field:'city', width:80}">城市</th>
      <th lay-data="{field:'sign'}">签名</th>
      <th lay-data="{field:'experience', width:80, sort: true, style:'background-color: #eee;'}">积分</th>
      <th lay-data="{field:'score', width:80, sort: true}">评分</th>
      <th lay-data="{field:'classify', width:80, style:'background-color: #009688; color: #fff;'}">职业</th>
      <th lay-data="{field:'wealth', width:135, sort: true}">财富</th>
    </tr>
  </thead>
</table>
 
<script type="text/html" id="usernameTpl">
  <a href="/?table-demo-id={{d.id}}" class="layui-table-link" target="_blank">{{ d.username }}</a>
</script>
<script type="text/html" id="sexTpl">
  {{#  if(d.sex === '女'){ }}
    <span style="color: #F581B1;">{{ d.sex }}</span>
  {{#  } else { }}
    {{ d.sex }}
  {{#  } }}
</script>

<script type="text/html" id="barDemo1">
  <a class="layui-btn layui-btn-xs" lay-event="edit">工具性按钮</a>
</script>
              
          
<script src="/vendor/strongadmin/plugins/layui/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
<script>
layui.use('table', function(){
  var table = layui.table;
});
</script>

</body>
</html>