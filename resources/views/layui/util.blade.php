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
            
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>固定块</legend>
</fieldset>
 
<p>囖，就页面右下角的那个。</p>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>倒计时</legend>
</fieldset>
请选择要计算的日期：
<div class="layui-inline">
  <input type="text" class="layui-input" id="test1" value="2099-01-01 00:00:00">
</div>
<blockquote class="layui-elem-quote" style="margin-top: 10px;">
  <div id="test2"></div>
</blockquote>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>某个时间在当前时间的多久前</legend>
</fieldset>
 
请选择要计算的日期：
<div class="layui-inline">
  <input type="text" class="layui-input" id="test3">
</div>
<span class="layui-word-aux" id="test4"></span>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>转换日期格式</legend>
</fieldset>
请编辑格式：
<div class="layui-inline">
  <input type="text" value="yyyy-MM-dd HH:mm:ss" class="layui-input" id="test5">
</div>
<span class="layui-word-aux" id="test6"></span>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>批量处理事件</legend>
</fieldset>
<div class="layui-btn-container">
  <button class="layui-btn" lay-active="e1">事件1</button>
  <button class="layui-btn" lay-active="e2">事件2</button>
  <button class="layui-btn" lay-active="e3">事件3</button>
</div>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>XSS 过滤</legend>
</fieldset>
<div class="layui-form layui-inline" style="width: 300px;">
  <textarea class="layui-textarea" id="test7">&lt;script&gt;
  alert(0);
&lt;/script&gt;
  </textarea>
</div>
<div class="layui-btn-container" style="margin-top: 10px;">
  <button class="layui-btn" id="test8">执行过滤</button>
</div>
              
          
<script src="/vendor/strongadmin/plugins/layui/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
<script>
layui.use(['util', 'laydate', 'layer'], function(){
  var util = layui.util
  ,laydate = layui.laydate
  ,$ = layui.$
  ,layer = layui.layer;
  //固定块
  util.fixbar({
    bar1: true
    ,bar2: true
    ,css: {right: 50, bottom: 100}
    ,bgcolor: '#393D49'
    ,click: function(type){
      if(type === 'bar1'){
        layer.msg('icon 是可以随便换的')
      } else if(type === 'bar2') {
        layer.msg('两个 bar 都可以设定是否开启')
      }
    }
  });
  
  //倒计时
  var thisTimer, setCountdown = function(y, M, d, H, m, s){
    var endTime = new Date(y, M||0, d||1, H||0, m||0, s||0) //结束日期
    ,serverTime = new Date(); //假设为当前服务器时间，这里采用的是本地时间，实际使用一般是取服务端的
     
    clearTimeout(thisTimer);
    util.countdown(endTime, serverTime, function(date, serverTime, timer){
      var str = date[0] + '天' + date[1] + '时' +  date[2] + '分' + date[3] + '秒';
      lay('#test2').html(str);
      thisTimer = timer;
    });
  };
  setCountdown(2099,1,1);
  
  laydate.render({
    elem: '#test1'
    ,type: 'datetime'
    ,done: function(value, date){
      setCountdown(date.year, date.month - 1, date.date, date.hours, date.minutes, date.seconds);
    }
  });
  
  
  //某个时间在当前时间的多久前
  var setTimeAgo = function(y, M, d, H, m, s){
    var str = util.timeAgo(new Date(y, M||0, d||1, H||0, m||0, s||0));
    lay('#test4').html(str);
  };
  laydate.render({
    elem: '#test3'
    ,type: 'datetime'
    ,done: function(value, date){
      setTimeAgo(date.year, date.month - 1, date.date, date.hours, date.minutes, date.seconds);
    }
  });
  
  //转换日期格式
  var toDateString = function(format){
    var dateString = util.toDateString(new Date(), format); //执行转换日期格式的方法
    $('#test6').html(dateString);
  };
  toDateString($('#test5').val());
  //监听输入框事件
  $('#test5').on('keyup', function(){
    toDateString(this.value);
  });
  
  //处理属性 为 lay-active 的所有元素事件
  util.event('lay-active', {
    e1: function(){
      layer.msg('触发了事件1');
    }
    ,e2: function(){
      layer.msg('触发了事件2');
    }
    ,e3: function(){
      layer.msg('触发了事件3');
    }
  });
  
  //XSS 过滤
  $('#test8').on('click', function(){ //监听按钮事件
    var str = util.escape($('#test7').val()); //执行 xss 过滤方法
    alert(str);
  });
});
</script>

</body>
</html>