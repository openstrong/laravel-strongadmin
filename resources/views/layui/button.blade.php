<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/vendor/strongadmin/plugins/layui/css/layui.css">
  <link rel="stylesheet" href="/vendor/strongadmin/plugins/layui/css/global.css">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->          
          
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>按钮主题</legend>
</fieldset>
 
<div class="layui-btn-container">
  <button type="button" class="layui-btn layui-btn-primary">原始按钮</button>
  <button type="button" class="layui-btn">默认按钮</button>
  <button type="button" class="layui-btn layui-btn-normal">百搭按钮</button>
  <button type="button" class="layui-btn layui-btn-warm">暖色按钮</button>
  <button type="button" class="layui-btn layui-btn-danger">警告按钮</button>
  <button type="button" class="layui-btn layui-btn-disabled">禁用按钮</button>
</div>
 
<div class="layui-btn-container">
  <button class="layui-btn layui-btn-primary layui-border">原始按钮</button>
  <button class="layui-btn layui-btn-primary layui-border-green">主色按钮</button>
  <button class="layui-btn layui-btn-primary layui-border-blue">百搭按钮</button>
  <button class="layui-btn layui-btn-primary layui-border-orange">暖色按钮</button>
  <button class="layui-btn layui-btn-primary layui-border-red">警告按钮</button>
  <button class="layui-btn layui-btn-primary layui-border-black">深色按钮</button>
</div>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>按钮尺寸</legend>
</fieldset>
  
<div class="layui-btn-container">  
  <button type="button" class="layui-btn layui-btn-lg">大型按钮</button>
  <button type="button" class="layui-btn">默认按钮</button>
  <button type="button" class="layui-btn layui-btn-sm">小型按钮</button>
  <button type="button" class="layui-btn layui-btn-xs">迷你按钮</button>
</div> 
 
<div class="layui-btn-container">
  <button type="button" class="layui-btn layui-btn-lg layui-btn-normal">大型按钮</button>
  <button type="button" class="layui-btn layui-btn-normal">默认按钮</button>
  <button type="button" class="layui-btn layui-btn-sm layui-btn-normal">小型按钮</button>
  <button type="button" class="layui-btn layui-btn-xs layui-btn-normal">迷你按钮</button>
</div>
 
<div class="layui-btn-container">
  <button type="button" class="layui-btn layui-btn-primary layui-btn-lg">大型按钮</button>
  <button type="button" class="layui-btn layui-btn-primary">默认按钮</button>
  <button type="button" class="layui-btn layui-btn-primary layui-btn-sm">小型按钮</button>
  <button type="button" class="layui-btn layui-btn-primary layui-btn-xs">迷你按钮</button>
</div>
 
<div style="width: 370px; margin: 0;">
  <button type="button" class="layui-btn layui-btn-fluid">流体按钮（即宽度最大化适应）</button>
</div>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>灵活的图标按钮（更多图标请阅览：文档-图标）</legend>
</fieldset>
 
<div class="layui-btn-container">
  <button type="button" class="layui-btn"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn"><i class="layui-icon"></i></button>
</div>
  
<div class="layui-btn-container">
  <button type="button" class="layui-btn layui-btn-danger"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-danger"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-danger"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-danger"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-danger"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-danger"><i class="layui-icon"></i></button>
</div>
  
<div class="layui-btn-container">
  <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
 
  <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
  
  <button type="button" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon"></i></button>
</div>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>还可以是圆角按钮</legend>
</fieldset>
 
<div class="layui-btn-container">
  <button type="button" class="layui-btn layui-btn-primary layui-btn-radius">原始按钮</button>
  <button type="button" class="layui-btn layui-btn-radius">默认按钮</button>
  <button type="button" class="layui-btn layui-btn-normal layui-btn-radius">百搭按钮</button>
  <button type="button" class="layui-btn layui-btn-warm layui-btn-radius">暖色按钮</button>
  <button type="button" class="layui-btn layui-btn-danger layui-btn-radius">警告按钮</button>
  <button type="button" class="layui-btn layui-btn-disabled layui-btn-radius">禁用按钮</button>
</div>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>风格混搭的按钮</legend>
</fieldset>
 
<div class="layui-btn-container">
  <button type="button" class="layui-btn layui-btn-lg layui-btn-primary layui-btn-radius">大型加圆角</button>
  <a href="http://www.layui.com/doc/element/button.html" class="layui-btn" target="_blank">跳转的按钮</a>
  <button type="button" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon"></i> 删除</button>
  <button type="button" class="layui-btn layui-btn-xs layui-btn-disabled"><i class="layui-icon"></i> 分享</button>
</div> 
 
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>按钮组</legend>
</fieldset> 
 
<div class="layui-btn-group">
  <button type="button" class="layui-btn">增加</button>
  <button type="button" class="layui-btn ">编辑</button>
  <button type="button" class="layui-btn">删除</button>
</div>
<div class="layui-btn-group">
  <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-sm"><i class="layui-icon"></i></button>
</div>
<div class="layui-btn-group">
  <button type="button" class="layui-btn layui-btn-primary layui-btn-sm">文字</button>
  <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
  <button type="button" class="layui-btn layui-btn-primary layui-btn-sm"><i class="layui-icon"></i></button>
</div>
 
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>按钮容器</legend>
</fieldset>
<div class="layui-btn-container">
  <button type="button" class="layui-btn">按钮一</button> 
  <button type="button" class="layui-btn">按钮二</button> 
  <button type="button" class="layui-btn">按钮三</button> 
</div>
<div class="layui-btn-container">
  <button type="button" class="layui-btn">按钮一</button> 
  <button type="button" class="layui-btn">按钮二</button> 
  <button type="button" class="layui-btn">按钮三</button> 
</div>
 
          
<script src="/vendor/strongadmin/plugins/layui/layui.js"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
<script>
 
</script>

</body>
</html>