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
        <style>
            .layui-side-child{
                left:0;
                position:relative;
                float: left;
                width:20%;
            }
            .site-demo-table{
                padding-left: 10px;
                float: left;
                min-width: 1000px;
                width:80%;
            }
        </style>
    </head>
    <body>
        <div class="layui-side layui-side-child">
            <div class="layui-side-scroll">
                <!-- 左侧子菜单 -->
                <ul class="layui-nav layui-nav-tree site-demo-table-nav">
                    <li class="layui-nav-item layui-this">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/table.html">简单数据表格</a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/auto.html">列宽自动分配<span class="layui-badge-dot"></span></a>
                    </li>

                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/data.html">赋值已知数据</a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/static.html">转化静态表格</a>
                    </li>

                    <hr>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/page.html">开启分页</a>
                    </li>     
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/resetPage.html">自定义分页</a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/toolbar.html">开启头部工具栏<span class="layui-badge-dot"></span></a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/totalRow.html">开启合计行<span class="layui-badge-dot"></span></a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/checkbox.html">开启复选框</a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/radio.html">开启单选框<span class="layui-badge-dot"></span></a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/cellEdit.html">开启单元格编辑</a>
                    </li>
                    <hr>

                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/form.html">加入表单元素</a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/style.html">设置单元格样式</a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/fixed.html">固定列</a>
                    </li>

                    <hr>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/operate.html">数据操作</a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/parseData.html">解析任意数据格式<span class="layui-badge-dot"></span></a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/onrow.html">行事件<span class="layui-badge-dot"></span></a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/reload.html">数据表格的重载</a>
                    </li>
                    <hr>

                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/height.html">高度最大化适应</a>
                    </li>
                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/initSort.html">设置初始排序</a>
                    </li>


                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/cellEvent.html">单元格事件</a>
                    </li>

                    <li class="layui-nav-item ">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="demo/table/thead.html">复杂表头</a>
                    </li>

                    <hr>
                    <li class="layui-nav-item">
                        <a  target="mainBodyLayui" class="layui-nav-title" href="/doc/modules/table.html" target="_blank">更多用法见文档</a>
                    </li>
                    <span class="layui-nav-bar" style="top: 191px; height: 0px; opacity: 0;"></span></ul>
            </div>

        </div>
        <div class="layui-tab layui-tab-brief site-demo-table" lay-filter="demoTitle">

            <!--<div style="width: 100%;">-->
            <iframe src="demo/table/table.html" name="mainBodyLayui" frameborder="0" scrolling="no" style="width:100%;height: 1500px;"></iframe>
            <!--</div>-->

        </div>
        <script src="/vendor/strongadmin/plugins/layui/layui.js"></script>
        <!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
        <script>
        </script>

    </body>
</html>