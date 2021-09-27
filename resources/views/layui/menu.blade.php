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
  以下为「基础菜单」的静态展示，更多操作可见：<a href="./dropdown.html" class="layui-btn layui-btn-primary layui-border-blue">下拉菜单组件</a> 
</blockquote>
<div class="layui-btn-container">
  <button type="button" class="layui-btn" lay-active="lg">大尺寸</button> 
  <button type="button" class="layui-btn" lay-active="normal">常规尺寸</button> 
</div>
<div class="layui-row layui-col-space30" id="demo-box" style="margin: 0 auto; max-width: 970px;">
  
  <div class="layui-col-xs9 layui-col-md3">
    <div class="layui-panel">
      <ul class="layui-menu" id="demo1">
        <li lay-options="{id: 100}">
          <div class="layui-menu-body-title">menu item 1</div>
        </li>
        <li lay-options="{id: 101}">
          <div class="layui-menu-body-title">
            <a href="">menu item 2 <span class="layui-badge-dot"></span></a>
          </div>
        </li>
        <li class="layui-menu-item-divider"></li>
        <li class="layui-menu-item-group layui-menu-item-down" lay-options="{type: 'group'}">
          <div class="layui-menu-body-title">
            menu group <i class="layui-icon layui-icon-up"></i>
          </div>
          <ul>
            <li lay-options="{id: 103}">
              <div class="layui-menu-body-title">menu item 3-1</div>
            </li>
            <li class="layui-menu-item-group" lay-options="{type: 'group', isAllowSpread: false}">
              <div class="layui-menu-body-title">menu group 2</div>
              <ul>
                <li class="layui-menu-item-checked">
                  <div class="layui-menu-body-title">menu item 3-2-1</div>
                </li>
                <li><div class="layui-menu-body-title">menu item 3-2-2</div></li>
              </ul>
            </li>
            <li><div class="layui-menu-body-title">menu item 3-3</div></li>
          </ul>
        </li>
        <li class="layui-menu-item-divider"></li>
        <li><div class="layui-menu-body-title">menu item 4 <span class="layui-badge">1</span></div></li>
        <li><div class="layui-menu-body-title">menu item 5</div></li>
        <li><div class="layui-menu-body-title">menu item 6</div></li>
        <li class="layui-menu-item-parent" lay-options="{type: 'parent'}">
          <div class="layui-menu-body-title">
            menu item 7 Children
            <i class="layui-icon layui-icon-right"></i>
          </div>
          <div class="layui-panel layui-menu-body-panel">
            <ul>
              <li class="layui-menu-item-parent" lay-options="{type: 'parent'}">
                <div class="layui-menu-body-title">
                  menu item 7-1
                  <i class="layui-icon layui-icon-right"></i>
                </div>
                <div class="layui-panel layui-menu-body-panel">
                  <ul>
                    <li><div class="layui-menu-body-title">menu item 7-2-1</div></li>
                    <li><div class="layui-menu-body-title">menu item 7-2-2</div></li>
                    <li><div class="layui-menu-body-title">menu item 7-2-3</div></li>
                    <li><div class="layui-menu-body-title">menu item 7-2-4</div></li>
                  </ul>
                </div>
              </li>
              <li><div class="layui-menu-body-title">menu item 7-2</div></li>
              <li><div class="layui-menu-body-title">menu item 7-3</div></li>
            </ul>
          </div>
        </li>
        <li>menu item 8</li>
        <li class="layui-menu-item-divider"></li>
        <li class="layui-menu-item-group" lay-options="{type: 'group'}">
          <div class="layui-menu-body-title">menu group 9</div>
          <ul>
            <li><div class="layui-menu-body-title">menu item 9-1</div></li>
            <li class="layui-menu-item-parent" lay-options="{type: 'parent'}">
              <div class="layui-menu-body-title">
                menu item 9-2
                <i class="layui-icon layui-icon-right"></i>
              </div>
              <div class="layui-panel layui-menu-body-panel">
                <ul>
                  <li><div class="layui-menu-body-title">menu item 9-2-1</div></li>
                  <li><div class="layui-menu-body-title">menu item 9-2-2</div></li>
                  <li><div class="layui-menu-body-title">menu item 9-2-3</div></li>
                </ul>
              </div>
            </li>
            <li><div class="layui-menu-body-title">menu item 9-31</div></li>
          </ul>
        </li>
        <li class="layui-menu-item-divider"></li>
        <li><div class="layui-menu-body-title">menu item 10</div></li>
      </ul>
    </div>
  </div>
  <div class="layui-col-xs9 layui-col-md3">
    <div class="layui-panel">
      <ul class="layui-menu" id="docDemoMenu1">
        <li lay-options="{id: 100}">
          <div class="layui-menu-body-title">menu item 1</div>
        </li>
        <li lay-options="{id: 101}">
          <div class="layui-menu-body-title">
            <a href="">menu item 2 <span class="layui-badge-dot"></span></a>
          </div>
        </li>
        <li class="layui-menu-item-divider"></li>
        <li class="layui-menu-item-group layui-menu-item-down" lay-options="{type: 'group', isAllowSpread: false}">
          <div class="layui-menu-body-title">
            menu group
          </div>
          <ul>
            <li lay-options="{id: 1031}"><div class="layui-menu-body-title">menu item 3-1</div></li>
            <li lay-options="{id: 1032}">
              <div class="layui-menu-body-title">menu item 3-2</div>
            </li>
          </ul>
        </li>
        <li class="layui-menu-item-divider"></li>
        <li class="layui-menu-item-group layui-menu-item-down" lay-options="{type: 'group', isAllowSpread: false}">
          <div class="layui-menu-body-title">menu group 2</div>
          <ul>
            <li lay-options="{id: 1031}"><div class="layui-menu-body-title">menu item 4-1</div></li>
            <li lay-options="{id: 1032}">
              <div class="layui-menu-body-title">menu item 4-2</div>
            </li>
          </ul>
        </li>
        <li class="layui-menu-item-divider"></li>
        <li class="layui-menu-item-parent" lay-options="{type: 'parent'}">
          <div class="layui-menu-body-title">
            menu item 5 
            <i class="layui-icon layui-icon-right"></i>
          </div>
          <div class="layui-panel layui-menu-body-panel">
            <ul>
              <li lay-options="{id: 1051}">
                <div class="layui-menu-body-title">menu item 5-1</div>
              </li>
              <li lay-options="{id: 1051}">
                <div class="layui-menu-body-title">menu item 5-2</div>
              </li>
            </ul>
          </div>
        </li>
        <li lay-options="{id: 106}">
          <div class="layui-menu-body-title">menu item 6</div>
        </li>
      </ul>
    </div>
  </div>
</div>  
               
          
<script src="/vendor/strongadmin/plugins/layui/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
<script>
layui.use(['dropdown', 'util'], function(){
  var dropdown = layui.dropdown
  ,util = layui.util
  ,$ = layui.jquery;
  
  //菜单点击事件
  dropdown.on('click(demo1)', function(options){
    var thisElem = $(this);
    console.log(thisElem, options);
  });
  
  
  util.event('lay-active', {
    normal: function(){
      $('#demo-box').children().addClass('layui-col-md3').removeClass('layui-col-md4');
      $('#demo-box').find('.layui-menu').removeClass('layui-menu-lg');
    }
    ,lg: function(){
      $('#demo-box').children().addClass('layui-col-md4').removeClass('layui-col-md3')
      $('#demo-box').find('.layui-menu').addClass('layui-menu-lg');
    }
  });
});
</script>

</body>
</html>