@verbatim
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
  <legend>初演示</legend>
</fieldset>
 
<div class="layui-btn-container">
  <button class="layui-btn demo1">
    下拉菜单
    <i class="layui-icon layui-icon-down layui-font-12"></i>
  </button>
  <button class="layui-btn layui-btn-primary demo1">
    下拉菜单
    <i class="layui-icon layui-icon-down layui-font-12"></i>
  </button>
</div>
 
<div class="layui-inline" style="width: 235px;">
  <input name="" placeholder="在输入框提供一些常用的选项" class="layui-input" id="demo2">
</div>
<div class="layui-inline layui-word-aux layui-font-gray">
  可以绑定任意元素，<a href="javascript:;" class="layui-font-blue" id="demo3">比如这段文字 <i class="layui-icon layui-font-12 layui-icon-down"></i></a>
</div>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>高级演示</legend>
</fieldset>
 
<div class="layui-btn-container">
  <button class="layui-btn" id="demo100">
    无限层级 + 跳转 + 事件 + 自定义模板
  </button>
</div>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>在表格中的应用</legend>
</fieldset>
 
<div style="max-width: 728px;">
  <table class="layui-hide" id="test-dropdown-table" lay-filter="test-dropdown-table"></table>
</div>
<script type="text/html" id="test-dropdown-toolbar-barDemo">
  <a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="edit">编辑</a>
  <a class="layui-btn layui-btn-xs" lay-event="more">更多 <i class="layui-icon layui-icon-down"></i></a>
</script>
<div style="margin-top: 15px">
   
<!-- 示例-970 -->
<!--
<ins class="adsbygoogle"
style="display:inline-block;width:970px;height:90px"
data-ad-client="ca-pub-6111334333458862"
data-ad-slot="3820120620"></ins>
-->
  
</div>
 
<fieldset class="layui-elem-field layui-field-title">
  <legend>自定义事件</legend>
</fieldset>
 
<div class="layui-btn-container">
  <button class="layui-btn layui-btn-primary" id="demo4">
    hover
    <i class="layui-icon layui-icon-more-vertical layui-font-12"></i>
  </button>
  <button class="layui-btn layui-btn-primary" id="demo5">
    mousedown
    <i class="layui-icon layui-icon-down layui-font-12"></i>
  </button>
  <button class="layui-btn layui-btn-primary" id="demo6">
    dblclick - 双击
    <i class="layui-icon layui-icon-circle layui-font-12"></i>
  </button>
</div>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>右键菜单</legend>
</fieldset>
 
<div class="layui-bg-gray" style="height: 260px; text-align: center;" id="demo7">
  <span class="layui-font-gray" style="position: relative; top:50%;">在此区域单击鼠标右键</span>
</div>
<button class="layui-btn" style="margin-top: 15px;" lay-demoactive="rightclick">
  开启全局右键菜单
</button>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>弹出位置</legend>
</fieldset>
 
<div class="layui-btn-container">
  <button class="layui-btn layui-btn-primary" id="demo200">
    左对齐
    <i class="layui-icon layui-icon-down layui-font-12"></i>
  </button>
  <button class="layui-btn layui-btn-primary" id="demo201">
    居中对齐
    <i class="layui-icon layui-icon-down layui-font-12"></i>
  </button>
  <button class="layui-btn layui-btn-primary" id="demo202">
    右对齐
    <i class="layui-icon layui-icon-down layui-font-12"></i>
  </button>
</div>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>重定义风格</legend>
</fieldset>
 
<div class="layui-btn-container">
  <button class="layui-btn" id="demo8">
    重定义样式
    <i class="layui-icon layui-icon-list layui-font-14"></i>
  </button>
  <style>
    .site-dropdown-demo,
    .site-dropdown-demo .layui-menu{background-color: #000; border: none;}
    .site-dropdown-demo .layui-menu li{color: #fff;}
    .site-dropdown-demo .layui-menu li:hover{background-color: #333;}
  </style>
  <button class="layui-btn" id="demo9">
    重定义内容
    <i class="layui-icon layui-icon-list layui-font-14"></i>
  </button>
</div>
 
          
<script src="/vendor/strongadmin/plugins/layui/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->

<script>
layui.use(['dropdown', 'util', 'layer', 'table'], function(){
  var dropdown = layui.dropdown
  ,util = layui.util
  ,layer = layui.layer
  ,table = layui.table
  ,$ = layui.jquery;
  
  //初演示
  dropdown.render({
    elem: '.demo1'
    ,data: [{
      title: 'menu item11'
      ,id: 100
    },{
      title: 'menu item22'
      ,id: 101
    },{
      title: 'menu item33'
      ,id: 102
    }]
    ,click: function(obj){
      layer.tips('点击了：'+ obj.title, this.elem, {tips: [1, '#5FB878']})
    }
  });
  
  //初演示 - 绑定输入框
  dropdown.render({
    elem: '#demo2'
    ,data: [{
      title: 'menu item 1'
      ,id: 101
    },{
      title: 'menu item 2'
      ,id: 102
    },{
      title: 'menu item 3'
      ,id: 103
    },{
      title: 'menu item 4'
      ,id: 104
    },{
      title: 'menu item 5'
      ,id: 105
    },{
      title: 'menu item 6'
      ,id: 106
    }]
    ,click: function(obj){
      this.elem.val(obj.title);
    }
    ,style: 'width: 235px;'
  });
  
  //初演示 - 绑定文字
  dropdown.render({
    elem: '#demo3'
    ,data: [{
      title: 'menu item 1'
      ,id: 100
    },{
      title: 'menu item 2'
      ,id: 101
      ,child: [{  //横向子菜单
        title: 'menu item 2-1'
        ,id: 1011
      },{
        title: 'menu item 2-2'
        ,id: 1012
      }]
    },{
      title: 'menu item 3'
      ,id: 102
    },{
      type: '-' //分割线
    },{
      title: 'menu group'
      ,id: 103
      ,type: 'group' //纵向菜单组
      ,child: [{
        title: 'menu item 4-1'
        ,id: 1031
      },{
        title: 'menu item 4-2'
        ,id: 1032
      }]
    },{
      type: '-' //分割线
    },{
      title: 'menu item 5'
      ,id: 104
    },{
      title: 'menu item 5'
      ,id: 104
    }]
    ,click: function(obj){
      this.elem.val(obj.title);
    }
  });
  
  //高级演示 - 各种组合
  dropdown.render({
    elem: '#demo100'
    ,data: [{
      title: 'menu item 1'
      ,templet: '<i class="layui-icon layui-icon-picture"></i> {{d.title}} <span class="layui-badge-dot"></span>'
      ,id: 100
      ,href: '#'
    },{
      title: 'menu item 2'
      ,templet: '<img src="//cdn.layui.com/avatar/168.jpg?t=123" style="width: 16px;"> {{d.title}}'
      ,id: 101
      ,href: '/'
      ,target: '_blank'
    }
    ,{type: '-'} //分割线
    ,{
      title: 'menu item 3'
      ,id: 102
      ,type: 'group'
      ,child: [{
        title: 'menu item 3-1'
        ,id: 103
      },{
        title: 'menu item 3-2'
        ,id: 104
        ,child: [{
          title: 'menu item 3-2-1'
          ,id: 105
        },{
          title: 'menu item 3-2-2'
          ,id: 11
          ,type: 'group'
          ,child: [{
            title: 'menu item 3-2-2-1'
            ,id: 111
          },{
            title: 'menu item 3-2-2-2'
            ,id: 1111
          }]
        },{
          title: 'menu item 3-2-3'
          ,id: 11111
        }]
      },{
        title: 'menu item 3-3'
        ,id: 111111
        ,type: 'group'
        ,child: [{
          title: 'menu item 3-3-1'
          ,id: 22
        },{
          title: 'menu item 3-3-2'
          ,id: 222
          ,child: [{
            title: 'menu item 3-3-2-1'
            ,id: 2222
          },{
            title: 'menu item 3-3-2-2'
            ,id: 22222
          },{
            title: 'menu item 3-3-2-3'
            ,id: 2222222
          }]
        },{
          title: 'menu item 3-3-3'
          ,id: 333
        }]
      }]
    }
    ,{type: '-'}
    ,{
      title: 'menu item 4'
      ,id: 4
    },{
      title: 'menu item 5'
      ,id: 5
      ,child: [{
        title: 'menu item 5-1'
        ,id: 55
        ,child: [{
          title: 'menu item 5-1-1'
          ,id: 5555
        },{
          title: 'menu item 5-1-2'
          ,id: 55555
        },{
          title: 'menu item 5-1-3'
          ,id: 555555
        }]
      },{
        title: 'menu item 5-2'
        ,id: 52
      },{
        title: 'menu item 5-3'
        ,id: 53
      }]
    },{type:'-'},{
      title: 'menu item 6'
      ,id: 66
      ,type: 'group'
      ,isSpreadItem: false
      ,child: [{
        title: 'menu item 6-1'
        ,id: 666
      },{
        title: 'menu item 6-2'
        ,id: 6666
      },{
        title: 'menu item 6-3'
        ,id: 66666
      }]
    }]
    ,click: function(item){
      layer.msg(util.escape(JSON.stringify(item)));
    }
  });
  
  // dropdown 在表格中的应用
  table.render({
    elem: '#test-dropdown-table'
    ,url: '/test/table/demo5.json'
    ,title: '用户数据表'
    ,cols: [[
      {type: 'checkbox', fixed: 'left'}
      ,{field:'id', title:'ID', width:80, fixed: 'left', unresize: true, sort: true}
      ,{field:'username', title:'用户名', width:120, edit: 'text'}
      ,{field:'email', title:'邮箱', minWidth:150}
      ,{fixed: 'right', title:'操作', toolbar: '#test-dropdown-toolbar-barDemo', width:150}
    ]]
    ,limits: [3]
    ,page: true
  });
  //行工具事件
  table.on('tool(test-dropdown-table)', function(obj){
    var that = this
    ,data = obj.data;
      
    if(obj.event === 'edit'){
      layer.prompt({
        formType: 2
        ,value: data.email
      }, function(value, index){
        obj.update({
          email: value
        });
        layer.close(index);
      });
    } else if(obj.event === 'more'){
      //更多下拉菜单
      dropdown.render({
        elem: that
        ,show: true //外部事件触发即显示
        ,data: [{
          title: 'item 1'
          ,id: 'aaa'
        }, {
          title: 'item 2'
          ,id: 'bbb'
        }, {
          title: '删除'
          ,id: 'del'
        }]
        ,click: function(data, othis){
          //根据 id 做出不同操作
          if(data.id === 'del'){
            layer.confirm('真的删除行么', function(index){
              obj.del();
              layer.close(index);
            });
          } else {
            layer.msg('得到表格下拉菜单 id：'+ data.id);
          }
        }
        ,align: 'right' //右对齐弹出（v2.6.8 新增）
        ,style: 'box-shadow: 1px 1px 10px rgb(0 0 0 / 12%);' //设置额外样式
      }); 
    }
  });
  
  //自定义事件 - hover
  dropdown.render({
    elem: '#demo4'
    ,trigger: 'hover'
    ,data: [{
      title: 'menu item 1'
      ,id: 100
    },{
      title: 'menu item 2'
      ,id: 101
    },{
      title: 'menu item 3'
      ,id: 102
    }]
  });
  
  //自定义事件 - mousedown
  dropdown.render({
    elem: '#demo5'
    ,trigger: 'mousedown'
    ,data: [{
      title: 'menu item 1'
      ,id: 100
    },{
      title: 'menu item 2'
      ,id: 101
    },{
      title: 'menu item 3'
      ,id: 102
    }]
  });
  
  //自定义事件 - dblclick
  dropdown.render({
    elem: '#demo6'
    ,trigger: 'dblclick'
    ,data: [{
      title: 'menu item 1'
      ,id: 100
    },{
      title: 'menu item 2'
      ,id: 101
    },{
      title: 'menu item 3'
      ,id: 102
    }]
  });
  
  //右键菜单
  var inst = dropdown.render({
    elem: '#demo7' //也可绑定到 document，从而重置整个右键
    ,trigger: 'contextmenu' //contextmenu
    ,isAllowSpread: false //禁止菜单组展开收缩
    ,style: 'width: 200px' //定义宽度，默认自适应
    ,id: 'test777' //定义唯一索引
    ,data: [{
      title: 'menu item 1'
      ,id: 'test'
    }, {
      title: 'Printing'
      ,id: 'print'
    },{
      title: 'Reload'
      ,id: 'reload'
    },{type:'-'},{
      title: 'menu item 3'
      ,id: '#3'
      ,child: [{
        title: 'menu item 3-1'
        ,id: '#1'
      },{
        title: 'menu item 3-2'
        ,id: '#2'
      },{
        title: 'menu item 3-3'
        ,id: '#3'
      }]
    },{type:'-'},{
      title: 'menu item 4'
      ,id: ''
    },{
      title: 'menu item 5'
      ,id: '#1'
    },{
      title: 'menu item 6'
      ,id: '#1'
    }]
    ,click: function(obj, othis){
      if(obj.id === 'test'){
        layer.msg('click');
      } else if(obj.id === 'print'){
        window.print();
      } else if(obj.id === 'reload'){
        location.reload();
      }
    }
  });
  
  //对齐方式
  dropdown.render({
    elem: '#demo200'
    ,data: [{
      title: 'menu item test 111'
      ,id: 100
    },{
      title: 'menu item test 222'
      ,id: 101
    },{
      title: 'menu item test 333'
      ,id: 102
    }]
  });
  dropdown.render({
    elem: '#demo201'
    ,align: 'center' //居中对齐（2.6.8 新增）
    ,data: [{
      title: 'menu item test 111'
      ,id: 100
    },{
      title: 'menu item test 222'
      ,id: 101
    },{
      title: 'menu item test 333'
      ,id: 102
    }]
  });
  dropdown.render({
    elem: '#demo202'
    ,align: 'right' //右对齐（2.6.8 新增）
    ,data: [{
      title: 'menu item test 111'
      ,id: 100
    },{
      title: 'menu item test 222'
      ,id: 101
    },{
      title: 'menu item test 333'
      ,id: 102
    }]
  });
  
  
  //重定义样式
  dropdown.render({
    elem: '#demo8'
    ,data: [{
      title: 'menu item 1'
      ,id: 100
    },{
      title: 'menu item 2'
      ,id: 101
    },{
      title: 'menu item 3'
      ,id: 103
    },{
      title: 'menu item 4'
      ,id: 104
    },{
      title: 'menu item 5'
      ,id: 105
    },{
      title: 'menu item 6'
      ,id: 106
    }]
    ,className: 'site-dropdown-demo'
    ,ready: function(elemPanel, elem){
      layer.msg('定义了一个 className');
    }
  });
  
  //重定义内容
  dropdown.render({
    elem: '#demo9'
    ,content: ['<div class="layui-tab layui-tab-brief">'
      ,'<ul class="layui-tab-title">'
        ,'<li class="layui-this">Tab header 1</li>'
        ,'<li>Tab header 2</li>'
        ,'<li>Tab header 3</li>'
      ,'</ul>'
      ,'<div class="layui-tab-content">'
        ,'<div class="layui-tab-item layui-text layui-show"><p style="padding-bottom: 10px;">在 content 参数中插入任意的 html 内容，可替代默认的下拉菜单。 从而实现更多有趣的弹出内容。</p><p> 是否发现，dropdown 组件不仅仅只是一个下拉菜单或者右键菜单，它能被赋予许多的想象可能。</p></div>'
        ,'<div class="layui-tab-item">Tab body 2</div>'
        ,'<div class="layui-tab-item">Tab body 3</div>'
      ,'</div>'
    ,'</div>'].join('')
    ,style: 'width: 370px; height: 200px; padding: 0 15px; box-shadow: 1px 1px 30px rgb(0 0 0 / 12%);'
    ,ready: function(){
      layui.use('element', function(element){
        element.render('tab');
      });
    }
  });
  
  
  //其他操作
  util.event('lay-demoactive', {
    //全局右键菜单
    rightclick: function(othis){
      if(!othis.data('open')){
        dropdown.reload('test777', {
          elem: document //将事件直接绑定到 document
        });
        layer.msg('已开启全局右键菜单，请尝试在页面任意处单击右键。')
        othis.html('取消全局右键菜单');
        othis.data('open', true);
      } else {
        dropdown.reload('test777', {
          elem: '#demo7' //重新绑定到指定元素上
        });
        layer.msg('已取消全局右键菜单，恢复默认右键菜单')
        othis.html('开启全局右键菜单');
        othis.data('open', false);
      }
    }
  })
});
</script>


</body>
</html>
@endverbatim