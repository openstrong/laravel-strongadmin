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
 
<table class="layui-table" lay-data="{height: 308, url:'/strongadmin/layui/demo/table/user', initSort: {field:'wealth', type:'desc'}}" lay-filter="demoEvent">
  <thead>
    <tr>
      <th lay-data="{field:'id', width:80}">ID</th>
      <th lay-data="{field:'username', width:80}">用户名</th>
      <th lay-data="{field:'score', width:80, sort: true}">评分</th>
      <th lay-data="{field:'wealth', sort: true, minWidth: 150}">财富</th>
    </tr>
  </thead>
</table> 
               
          
<script src="/vendor/strongadmin/plugins/layui/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
<script>
layui.use('table', function(){
  var table = layui.table; 
});
</script>

</body>
</html>