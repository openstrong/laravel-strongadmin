@extends('strongadmin::layouts.app')
@push('styles')
<style></style>
@endpush
@push('scripts')
<script></script>
@endpush
@section('content')
<div class="st-h15"></div>
<form class="layui-form st-form-search" lay-filter="ST-FORM-SEARCH">
    <div class="layui-form-item"><div class="layui-inline">
            <label class="layui-form-label">{{$model->getAttributeLabel('user_name')}}</label>
            <div class="layui-input-inline">
                <input type="text" name="user_name" autocomplete="off" placeholder="" class="layui-input">
            </div>
        </div><div class="layui-inline">
            <label class="layui-form-label">{{$model->getAttributeLabel('role_id')}}</label>
            <div class="layui-input-inline">
                <input type="text" name="role_id" autocomplete="off" placeholder="" class="layui-input">
            </div>
        </div>
        <!-- <div class="layui-inline">
            <label class="layui-form-label">{{$model->getAttributeLabel('name')}}</label>
            <div class="layui-input-inline">
                <input type="text" name="name" autocomplete="off" placeholder="" class="layui-input">
            </div>
        </div> -->
        <!-- <div class="layui-inline">
            <label class="layui-form-label">{{$model->getAttributeLabel('email')}}</label>
            <div class="layui-input-inline">
                <input type="text" name="email" autocomplete="off" placeholder="" class="layui-input">
            </div>
        </div> -->
        <!-- <div class="layui-inline">
            <label class="layui-form-label">{{$model->getAttributeLabel('phone')}}</label>
            <div class="layui-input-inline">
                <input type="text" name="phone" autocomplete="off" placeholder="" class="layui-input">
            </div>
        </div> -->
        <!-- <div class="layui-inline">
            <label class="layui-form-label">{{$model->getAttributeLabel('status')}}</label>
            <div class="layui-input-inline">
                <input type="text" name="status" autocomplete="off" placeholder="" class="layui-input">
            </div>
        </div> -->
        <!-- <div class="layui-inline">
            <label class="layui-form-label">{{$model->getAttributeLabel('last_at')}}</label>
            <div class="layui-input-inline">
                <input type="text" name="last_at" autocomplete="off" placeholder="" class="layui-input">
            </div>
        </div> -->
        <div class="layui-inline">
            <label class="layui-form-label">{{$model->getAttributeLabel('created_at')}}</label>
            <div class="layui-input-inline">
                <input type="text" name="created_at_begin" id="date" placeholder="???-???-???" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline">
                <input type="text" name="created_at_end" id="date2" placeholder="???-???-???" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <a class="layui-btn layui-btn-xs st-search-button">????????????</a>
        </div>
    </div>
</form>
<table class="layui-hide" id="ST-TABLE-LIST" lay-filter="ST-TABLE-LIST"></table>
<script type="text/html" id="ST-TOOL-BAR">
    <div class="layui-btn-container st-tool-bar">
        <a class="layui-btn layui-btn-xs" onclick="Util.createFormWindow('/strongadmin/adminUser/create', this.innerText);">??????</a>
        <a class="layui-btn layui-btn-xs" lay-event="batchDelete" data-href="/admin/adminUser/destroy">????????????</a>
    </div>
</script>
<script type="text/html" id="ST-OP-BUTTON">
    @verbatim
    <a class="layui-btn layui-btn-xs" onclick="Util.createFormWindow('/strongadmin/adminUser/update?id={{d.id}}', this.innerText);">????????????</a>
    <a class="layui-btn layui-btn-xs" onclick="Util.createFormWindow('/strongadmin/adminUser/update?id={{d.id}}', this.innerText);">??????</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" onclick="Util.destroy('/strongadmin/adminUser/destroy?id={{d.id}}');">??????</a>
    @endverbatim
</script>
@endsection
@push('scripts_bottom')        
<script>
!function () {
    //??????
    layui.laydate.render({
        elem: '#date'
    });
    layui.laydate.render({
        elem: '#date2'
    });
    //????????????
    var cols = [
                {type: 'checkbox', fixed: 'left'}
                , {field: 'id', title: 'id', width: 60, fixed: 'left', unresize: true, totalRowText: '??????', sort: true}
                , {field: 'user_name', title: '{{$model->getAttributeLabel("user_name")}}', width: 150}
                , {field: 'name', title: '{{$model->getAttributeLabel("name")}}', width: 100}
                , {field: 'role_id', title: '{{$model->getAttributeLabel("role_id")}}', width: 150, templet: function (res) {
                                        return  res.roles.map(function(obj,index){
                                                    return obj.name;
                                                }).join(",");
                    }}
                , {field: 'email', title: '{{$model->getAttributeLabel("email")}}', width: 150}
                , {field: 'phone', title: '{{$model->getAttributeLabel("phone")}}', width: 150}
                , {field: 'introduction', title: '{{$model->getAttributeLabel("introduction")}}', width: 150}
                , {field: 'status', title: '{{$model->getAttributeLabel("status")}}', width: 80, templet: function (res) {
                    return  res.status==1  ? '<button class="layui-btn layui-btn-xs st-btn-bg-succ">??????</button>' : '<button class="layui-btn layui-btn-xs layui-btn-radius layui-btn-danger">??????</button>';
                    }}
                , {field: 'last_ip', title: '{{$model->getAttributeLabel("last_ip")}}', width: 150}
                , {field: 'last_at', title: '{{$model->getAttributeLabel("last_at")}}', width: 150}
                , {field: 'created_at', title: '{{$model->getAttributeLabel("created_at")}}', width: 150}
                , {field: 'updated_at', title: '{{$model->getAttributeLabel("updated_at")}}', width: 150}
                , {fixed: 'right', title: '??????', toolbar: '#ST-OP-BUTTON', width: 200}
            ];
    var tableConfig = {
        cols: [cols]
    };
    Util.renderTable(tableConfig);
}();
</script>
@endpush