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
            
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>默认修饰</legend>
</fieldset>
 
      <pre class="layui-code">//在里面存放任意的文本内容
test
test
test
      </pre>
      
      <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
        <legend>notepad 风格</legend>
      </fieldset>
       
      <pre class="layui-code" lay-title="JavaScript" lay-skin="notepad">//在里面存放任意的文本内容
test
test
test
      </pre>
      
     
      
      <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
        <legend>叠加使用</legend>
      </fieldset>
       
      <pre class="layui-code">//在里面存放任意的文本内容
test
test
test
      <pre class="layui-code">//在里面存放任意的文本内容
test
test
test
      </pre>
      </pre>
      
      <pre class="layui-code" lay-skin="notepad">//在里面存放任意的文本内容
test
test
test
      <pre class="layui-code" lay-skin="notepad">//在里面存放任意的文本内容
test
test
test
<pre class="layui-code" lay-skin="notepad">//在里面存放任意的文本内容
test
test
test
<pre class="layui-code" lay-skin="notepad">//在里面存放任意的文本内容
test
test
test
<pre class="layui-code" lay-skin="notepad">//在里面存放任意的文本内容
test
test
test
      </pre>
      </pre>
      </pre>
      </pre>
      </pre>
      
      <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
        <legend>固定高度</legend>
      </fieldset>
       
      <pre class="layui-code" lay-height="150px">//在里面存放任意的文本内容
test
test
test
      </pre>       
          
<script src="/vendor/strongadmin/plugins/layui/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
<script>
layui.use('code', function(){
  
  //layui.code(); 实际使用时，执行该方法即可。而此处注释是因为修饰器在别的js中已经执行过了
});
</script>

</body>
</html>