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
                        <i class="fa fa-home"></i>&nbsp;会员管理
                    </li>
                    <li>会员列表</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->
            <!-- Page Body -->
            <div class="page-body">
                <a href="{{url('admin/member-add')}}" class="btn btn-sm btn-primary"><i
                        class="fa fa-plus"></i>&nbsp;会员添加</a>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="widget">
                            <div class="widget-header">
                                <span class="widget-caption">会员列表</span>
                                <div class="widget-buttons">
                                    {!!strToElement($members->links())!!}
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
                                            <th>创建时间</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $vo)
                                        <tr>
                                            <td><span>{{$vo->id}}</span></td>
                                            <td><span>{{$vo->username}}</span></td>
                                            <td><span>{{$vo->nickname}}</span></td>
                                            <td><span>{{$vo->email}}</span></td>
                                            <td><span>{{$vo->created_at}}</span></td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-md delete"
                                                    dataid="{{$vo->id}}">删除</a>
                                                <a href="{{url('admin/member-edit',['id' => $vo->id])}}"
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


    $('.delete').click(function() {
        var id = $(this).attr('dataid');
        var res = {
            "id": id
        };
        var url = '{{url("admin/member-delete")}}';
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