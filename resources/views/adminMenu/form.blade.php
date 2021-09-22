@extends('strongadmin::layouts.app')
@push('styles')
<style></style>
@endpush
@push('scripts')
<script></script>
@endpush
@section('content')
<div class="st-h15"></div>
<form class="layui-form" action="">
    <input name="id" type="hidden" value="{{$model->id}}" />
    <input name="level" type="hidden" value="{{$model->level}}" />
    <input name="parent_id" type="hidden" value="{{$model->parent_id}}" />
    <div class="layui-row">
        <div class="layui-col-xs11">
            <div class="layui-form-item">
                <label class="layui-form-label st-form-input-required">{{$model->getAttributeLabel('parent_id')}}</label>
                <div class="layui-input-block">
                    @if($model->id && $model->level==2)
                    <select name="parent_id">
                        <option value="">请选择</option>
                        @foreach ($menus as $menu)
                        <option value="{{$menu->id}}" @if($menu->id==$model->parent_id) selected @endif >{{$menu->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <input type="text" name="parent_name" value="{{request('parent_name')}}" autocomplete="off" placeholder="" class="layui-input" readonly>
                    @endif
                    <div class="layui-word-aux st-form-tip st-form-tip-error"></div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label st-form-input-required">{{$model->getAttributeLabel('name')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="name" value="{{$model->name}}" autocomplete="off" placeholder="" class="layui-input">
                    <div class="layui-word-aux st-form-tip st-form-tip-error"></div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{$model->getAttributeLabel('route_url')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="route_url" value="{{$model->route_url}}" autocomplete="off" placeholder="" class="layui-input">
                    <div class="layui-word-aux st-form-tip layui-show">即跳转地址，一级菜单可以不填写</div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{$model->getAttributeLabel('sort')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="sort" value="{{$model->sort}}" autocomplete="off" placeholder="" class="layui-input">
                    <div class="layui-word-aux st-form-tip st-form-tip-error"></div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{$model->getAttributeLabel('status')}}</label>
                <div class="layui-input-block">
                    <input type="radio" name="status" value="1" title="开启" @if($model->status==1)checked @endif>
                    <input type="radio" name="status" value="2" title="禁用" @if($model->status==2)checked @endif>
                </div>
            </div>
        </div>
    </div>
    <div class="layui-form-item st-form-submit-btn">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="ST-SUBMIT">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
@endsection

@push('scripts_bottom')
<script>
    !function () {
        layui.form.on('submit(ST-SUBMIT)', function (data) {
            //console.log(data)
            //layer.alert(JSON.stringify(data.field), {
            //    title: '最终的提交信息'
            //});

            var formObj = 'form.layui-form';//表单
            var data = data.field;//表单数据对象
            var url = $(formObj).attr('action');//表单提交url
            if (!url) {
                url = window.location.pathname;
            }
            //注意：parent 是 JS 自带的全局对象，可用于操作父页面
            var iframeIndex = Util.iframeIndex; //获取窗口索引
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: data,
                contentType: 'application/x-www-form-urlencoded',
                success: function (response, status, xhr) {
                    console.log(response);
                    $(formObj).find(":input").siblings('div.st-form-tip-error').text('');
                    if (response.code !== 200) {
                        //显示错误
                        Util.showErrors(formObj, response);
                        return;
                    }
                    //success
                    layer.msg(response.message, {
                        time: 1500
                    });
                    setTimeout(function () {
                        if (iframeIndex) {
                            parent.layer.close(iframeIndex);//关闭父窗口
                            parent.window.location.reload();//重载父页面
                            return;
                        }
                        if (response.toUrl) {
                            window.location.href = response.toUrl;
                            return;
                        }
                        window.location.reload();//重载页面
                    }, 1600);
                    return;
                }
            });

            return false;
        });
    }();
</script>
@endpush
