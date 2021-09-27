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
          
<blockquote class="layui-elem-quote">
  大部分演示都在 layer 独立组件的官网（<a class="layui-font-blue" href="https://layer.layui.com/" target="_blank">layer.layui.com</a>），与内置的 layer 模块，用法是完全一致的
</blockquote>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>特殊例子</legend>
</fieldset>
 
<div id="layerDemo" style="margin-bottom: 0;">
  <blockquote class="layui-elem-quote layui-quote-nm">
    Tips：为了更清晰演示，每触发下述一个例子之前，都会关闭所有已经演示的层
  </blockquote>
  
  <div class="layui-btn-container" style="margin-top: 30px;">
    <button data-method="setTop" class="layui-btn">多窗口模式 + 层叠置顶 + Esc 关闭</button>
    <button data-method="confirmTrans" class="layui-btn">配置一个透明的询问框</button>
    <button data-method="notice" class="layui-btn">示范一个公告层</button>
  </div>
  <div class="layui-btn-container">
    <button data-method="offset" data-type="t" class="layui-btn layui-btn-normal">上弹出</button>
    <button data-method="offset" data-type="r" class="layui-btn layui-btn-normal">右弹出</button>
    <button data-method="offset" data-type="b" class="layui-btn layui-btn-normal">下弹出</button>
    <button data-method="offset" data-type="l" class="layui-btn layui-btn-normal">左弹出</button>
    <button data-method="offset" data-type="lt" class="layui-btn layui-btn-normal">左上弹出</button>
    <button data-method="offset" data-type="lb" class="layui-btn layui-btn-normal">左下弹出</button>
    <button data-method="offset" data-type="rt" class="layui-btn layui-btn-normal">右上弹出</button>
    <button data-method="offset" data-type="rb" class="layui-btn layui-btn-normal">右下弹出</button>
    <button data-method="offset" data-type="auto" class="layui-btn layui-btn-normal">居中弹出</button>
  </div>
  
  <div style="margin-top: 15px">
     
<!-- 示例-970 -->
<!--
<ins class="adsbygoogle"
style="display:inline-block;width:970px;height:90px"
data-ad-client="ca-pub-6111334333458862"
data-ad-slot="3820120620"></ins>
-->
  
  </div>
</div>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>更多示例</legend>
</fieldset>
<a class="layui-btn layui-btn-normal" href="https://layer.layui.com/" target="_blank">去 layer 官网查看</a>
   
          
<script src="/vendor/strongadmin/plugins/layui/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
<script>
layui.use('layer', function(){ //独立版的layer无需执行这一句
  var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
  
  //触发事件
  var active = {
    setTop: function(){
      var that = this; 
      //多窗口模式，层叠置顶
      layer.open({
        type: 1 //此处以iframe举例
        ,title: '当你选择该窗体时，即会在最顶端'
        ,area: ['390px', '260px']
        ,shade: 0
        ,maxmin: true
        ,offset: [ //为了演示，随机坐标
          Math.random()*($(window).height()-300)
          ,Math.random()*($(window).width()-390)
        ] 
        ,content: '<div style="padding: 15px;">内容标记：'+ new Date().getTime() + '，按 ESC 键可关闭。<br><br>当你的页面有很多很多 layer 窗口，你需要像 Window 窗体那样，点击某个窗口，该窗体就置顶在上面，那么 layer.setTop() 可以来轻松实现。它采用巧妙的逻辑，以使这种置顶的性能达到最优。</div>'
        
        ,btn: ['继续弹出', '全部关闭'] //只是为了演示
        ,yes: function(){
          $(that).click(); 
        }
        ,btn2: function(){
          layer.closeAll();
        }
        
        ,zIndex: layer.zIndex //重点1
        ,success: function(layero, index){
          layer.setTop(layero); //重点2. 保持选中窗口置顶
          
          //记录索引，以便按 esc 键关闭。事件见代码最末尾处。
          layer.escIndex = layer.escIndex || [];
          layer.escIndex.unshift(index);
          //选中当前层时，将当前层索引放置在首位
          layero.on('mousedown', function(){
            var _index = layer.escIndex.indexOf(index);
            if(_index !== -1){
              layer.escIndex.splice(_index, 1); //删除原有索引
            }
            layer.escIndex.unshift(index); //将索引插入到数组首位
          });
        }
        ,end: function(){
          //更新索引
          if(typeof layer.escIndex === 'object'){
            layer.escIndex.splice(0, 1);
          }
        }
      });
    }
    ,confirmTrans: function(){
      //配置一个透明的询问框
      layer.msg('大部分参数都是可以公用的<br>合理搭配，展示不一样的风格', {
        time: 20000, //20s后自动关闭
        btn: ['明白了', '知道了', '哦']
      });
    }
    ,notice: function(){
      //示范一个公告层
      layer.open({
        type: 1
        ,title: false //不显示标题栏
        ,closeBtn: false
        ,area: '300px;'
        ,shade: 0.8
        ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
        ,btn: ['火速围观', '残忍拒绝']
        ,btnAlign: 'c'
        ,moveType: 1 //拖拽模式，0或者1
        ,content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">你知道吗？亲！<br>layer ≠ layui<br><br> layer 只是作为 layui 的一个弹层模块，由于其用户基数较大，所以常常会有人以为 layui 是 <del>layerui</del><br><br>layer 虽然已被 Layui 收编为内置的弹层模块，但仍然会作为一个独立组件全力维护、升级 ^_^</div>'
        ,success: function(layero){
          var btn = layero.find('.layui-layer-btn');
          btn.find('.layui-layer-btn0').attr({
            href: 'http://www.layui.com/'
            ,target: '_blank'
          });
        }
      });
    }
    ,offset: function(othis){
      var type = othis.data('type')
      ,text = othis.text();
      
      layer.open({
        type: 1
        ,offset: type //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
        ,id: 'layerDemo'+type //防止重复弹出
        ,content: '<div style="padding: 20px 100px;">'+ text +'</div>'
        ,btn: '关闭全部'
        ,btnAlign: 'c' //按钮居中
        ,shade: 0 //不显示遮罩
        ,yes: function(){
          layer.closeAll();
        }
      });
    }
  };
  
  $('#layerDemo .layui-btn').on('click', function(){
    var othis = $(this), method = othis.data('method');
    active[method] ? active[method].call(this, othis) : '';
  });
  
  
  //多窗口模式 - esc 键
  $(document).on('keyup', function(e){
    if(e.keyCode === 27){
      layer.close(layer.escIndex ? layer.escIndex[0] : 0);
    }
  });
});
</script>

</body>
</html>