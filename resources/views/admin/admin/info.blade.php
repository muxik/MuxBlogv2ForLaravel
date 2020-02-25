@include('admin.public.__head')
<!-- /Navbar -->
<!-- Main Container -->
<div class="main-container container-fluid">
    <!-- Page Container -->
    <div class="page-container">

        <!-- Page Sidebar -->
        @include('admin.public.__left')
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i>&nbsp;管理员管理
                    </li>
                    <li>管理员列表</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->
            <!-- Page Body -->
            <div class="page-body">
                <a href="{{url('admin/admin-add')}}" class="btn btn-sm btn-primary"><i
                        class="fa fa-plus"></i>&nbsp;管理员添加</a>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="widget">
                            <div class="widget-header">
                                <span class="widget-caption">管理员列表</span>
                                <div class="widget-buttons">
                                    {!!strToElement($admins->links())!!}
                                </div>
                            </div>
                            <div class="widget-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>用户名</th>
                                            <th>昵称</th>
                                            <th>邮箱</th>
                                            <th>权限</th>
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $vo)
                                        <tr>
                                            <td><span>{{$vo->id}}</span></td>
                                            <td><span>{{$vo->username}}</span></td>
                                            <td><span>{{$vo->nickname}}</span></td>
                                            <td><span>{{$vo->email}}</span></td>
                                            <td>
                                                @if ($vo->is_super == 1)
                                                <span>超级管理员</span>
                                                @else
                                                <span>普通管理员</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($vo->status == 1)
                                                <i class="glyphicon glyphicon-ok-sign">已启用</i>
                                                @else
                                                <i class="glyphicon glyphicon-remove-sign">已禁用</i>
                                                @endif
                                            </td>

                                            <td>
                                                @if (session('admin.is_super') == 1)
                                                @if ($vo->is_super != 1)
                                                @if ($vo->status == 1)
                                                <a href="#" class="btn btn-warning btn-md admin-status"
                                                    dataid="{{$vo->id}}" status="{{$vo->status}}">禁用</a>
                                                @else
                                                <a href="#" class="btn btn-success btn-md admin-status"
                                                    dataid="{{$vo->id}}" status="{{$vo->status}}">启用</a>
                                                @endif
                                                @endif
                                                <a href="#" class="btn btn-danger btn-md delete"
                                                    dataid="{{$vo->id}}">删除</a>
                                                @endif
                                                <a href="{{url('admin/admin-edit',['id' => $vo->id])}}"
                                                    class="btn btn-blue btn-md">编辑</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Container -->
    <!-- Main Container -->

</div>
@include('admin.public.__js')
</body>
<!--  /Body -->
<script>
$(function() {
    $('.pagination').addClass('pagination-sm');

    $('.admin-status').click(function(e) {
        var id = $(this).attr('dataid');
        var status = $(this).attr('status');

        if (status == 1) {
            var msg = "确认禁用吗?"
        } else {
            var msg = "确认启用吗?"
        }
        layer.confirm(msg, {
            title: "管理员操作",
            icon: 3
        }, function(index) {
            layer.close(index);

            var url = '{{url("admin/admin-status")}}';
            $.ajax({
                url: url,
                data: {
                    "id": id,
                    "status": status
                },
                type: 'post',
                success: function(data) {
                    if (data.code == 1) {
                        layer.alert(data.msg, {
                            icon: 6
                        }, function(index) {
                            layer.close(index);
                            location.href = data.url
                        })
                    } else {
                        layer.alert(data.msg, {
                            icon: 5
                        }, function(index) {
                            layer.close(index);
                        })
                    }
                }
            });
        });
        return false;
    });

    $('.delete').click(function() {
        var id = $(this).attr('dataid');
        var res = {
            "id": id
        };
        var url = '{{url("admin/admin-delete")}}';
        layer.confirm("确定删除吗?", {
            title: "删除操作",
            icon: 3
        }, function(index) {
            layer.close(index);
            $.ajax({
                url: url,
                data: res,
                type: 'post',
                success: function(data) {
                    if (data.code == 1) {
                        layer.alert(data.msg, {
                            icon: 6
                        }, function(index) {
                            layer.close(index);
                            location.href = data.url
                        })
                    } else {
                        layer.alert(data.msg, {
                            icon: 5
                        }, function(index) {
                            layer.close(index);
                        })
                    }
                }
            });
        });
        return false;
    });
});
</script>

</html>