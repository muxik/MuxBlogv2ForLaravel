@include('admin.public.__head')
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
                        <i class="fa fa-home"></i>&nbsp;栏目管理
                    </li>
                    <li>栏目列表</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->
            <!-- Page Body -->
            <div class="page-body">
                <a href="{{url('admin/cate-add')}}" class="btn btn-sm btn-primary"><i
                        class="fa fa-plus"></i>&nbsp;栏目添加</a>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="widget">
                            <div class="widget-header">
                                <span class="widget-caption">栏目列表</span>
                                <div class="widget-buttons">
                                    <!-- 分页 -->
                                    {!!strToElement($cates->links())!!}
                                </div>
                            </div>
                            <div class="widget-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>排序</th>
                                            <th>栏目名称</th>
                                            <th>创建时间</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cates as $vo)
                                        <tr>
                                            <td>{{$vo->id}}</td>
                                            <td><input size="1" type="text" name="sort" value="{{$vo->sort}}"
                                                    dataid="{{$vo->id}}"></td>
                                            <td>{{$vo->cate_name}}</td>
                                            <td>{{$vo->created_at}}</td>
                                            <td>
                                                <a href="{{url('admin/cate-edit',['id' => $vo->id])}}"
                                                    class="btn btn-azure btn-md">编辑</a>
                                                <a href="#" class="btn btn-danger btn-md delete"
                                                    dataid="{{$vo->id}}">删除</a>
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

</html>

<script>
$(function() {
    $('input[name=sort]').change(function() {
        var id = $(this).attr('dataid');
        var sort = $(this).val();
        var url = '{{url("admin/cate-sort")}}';
        $.ajax({
            url: url,
            data: {
                id: id,
                sort: sort
            },
            type: 'post',
            success: function(data) {
                if (data.code == 1) {
                    layer.msg(data.msg, {
                        icon: 6,
                        time: 1000
                    }, function() {
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
        return false;
    });

    $('.delete').click(function() {
        var id = $(this).attr('dataid');
        var res = {
            "id": id
        };
        var url = '{{url("admin/cate-delete")}}';
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