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
  <legend>信息流 - 滚动加载</legend>
</fieldset>
 
<ul class="flow-default" id="LAY_demo1"></ul>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>信息流 - 手工加载</legend>
</fieldset>
 
<ul class="flow-default" style="height: 300px;" id="LAY_demo2"></ul>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>图片懒加载</legend>
</fieldset>
<div class="site-demo-flow" id="LAY_demo3">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
  <img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png">
</div>
 
<p style="margin-top: 20px;">
  无论滚动条上滑还是下滑，都只始终加载当前屏的图片（你可以快速拉动滚动条到中间区域，然后再往上滑动试试）
  <br>layui 的图片懒加载，除了对滚动条的性能进行了美好的优化，也对图片的「当前屏」进行了高效计算，无惧于任何规模庞大的图片数量！
</p>             
          
<script src="/vendor/strongadmin/plugins/layui/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
<script>
layui.use('flow', function(){
  var flow = layui.flow;
 
  flow.load({
    elem: '#LAY_demo1' //流加载容器
    ,scrollElem: '#LAY_demo1' //滚动条所在元素，一般不用填，此处只是演示需要。
    ,done: function(page, next){ //执行下一页的回调
      
      //模拟数据插入
      setTimeout(function(){
        var lis = [];
        for(var i = 0; i < 8; i++){
          lis.push('<li>'+ ( (page-1)*8 + i + 1 ) +'</li>')
        }
        
        //执行下一页渲染，第二参数为：满足“加载更多”的条件，即后面仍有分页
        //pages为Ajax返回的总页数，只有当前页小于总页数的情况下，才会继续出现加载更多
        next(lis.join(''), page < 10); //假设总页数为 10
      }, 500);
    }
  });
  
  flow.load({
    elem: '#LAY_demo2' //流加载容器
    ,scrollElem: '#LAY_demo2' //滚动条所在元素，一般不用填，此处只是演示需要。
    ,isAuto: false
    ,isLazyimg: true
    ,done: function(page, next){ //加载下一页
      //模拟插入
      setTimeout(function(){
        var lis = [];
        for(var i = 0; i < 6; i++){
          lis.push('<li><img lay-src="https://cdn.layui.com/upload/2017_3/168_1488985841996_23077.png?v='+ ( (page-1)*6 + i + 1 ) +'"></li>')
        }
        next(lis.join(''), page < 6); //假设总页数为 6
      }, 500);
    }
  });
  
  //按屏加载图片
  flow.lazyimg({
    elem: '#LAY_demo3 img'
    ,scrollElem: '#LAY_demo3' //一般不用设置，此处只是演示需要。
  });
  
});
</script>

</body>
</html>