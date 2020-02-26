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
                    <li>
                        <i class="fa fa-home"></i>&nbsp;文章管理
                    </li>
                    <li>文章列表</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->
            <!-- Page Body -->
            <div class="page-body">
                <a href="{{url('admin/article-add')}}" class="btn btn-sm btn-primary"><i
                        class="fa fa-plus"></i>&nbsp;添加文章</a>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="widget">
                            <div class="widget-header">
                                <span class="widget-caption">添加文章</span>
                                <div class="widget-buttons">
                                    {!!strToElement($articles->links())!!}
                                </div>
                            </div>
                            <div class="widget-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>文章标题</th>
                                            <th>文章作者</th>
                                            <th>所属导航</th>
                                            <th>是否推荐(点击取消)</th>
                                            <th>文章状态(点击更换)</th>
                                            <th>发布时间</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    @forelse ($articles as $vo)
                                    <tr>
                                        <td><span>{{$vo->id}}</span></td>
                                        <td><span>{{$vo->title}}</span></td>
                                        <td><span>{{$vo->members->nickname}}</span></td>
                                        <td><span>{{$vo->cates->cate_name}}</span></td>
                                        <td>
                                            @if($vo->is_top == 1)
                                            <a href="#" class="glyphicon glyphicon-thumbs-up is_top"
                                                dataid="{{$vo->id}}" is_top="{{$vo->is_top}}" title="点击操作">推荐</a>
                                            @else
                                            <a href="#" class="glyphicon glyphicon-thumbs-down is_top"
                                                dataid="{{$vo->id}}" is_top="{{$vo->is_top}}" title="点击操作">不推荐</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($vo->status == 1)
                                            <a href="#" status="{{$vo->status}}" dataid="{{$vo->id}}"
                                                class="glyphicon glyphicon-ok-sign status" title="点击操作">审核已通过</a>
                                            @else
                                            <a href="#" status="{{$vo->status}}" dataid="{{$vo->id}}"
                                                class="glyphicon glyphicon-remove-sign status" title="点击操作">审核未通过</a>
                                            @endif
                                        </td>
                                        <td><span>{{$vo->created_at}}</span></td>
                                        <td>
                                            <a href="{{url('admin/article-edit',['id' => $vo->id])}}"
                                                class="btn btn-md btn-warning">编辑</a>
                                            <a href="#" class="btn btn-md btn-danger delete" dataid="{{$vo->id}}">删除</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr->
                                        <td colspan="8">
                                            <h3 class="text-center">没有文章...</h3>
                                        </td>
                                    </tr->
                                    @endforelse
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
    $('.is_top').click(function() {
        var is_top = $(this).attr('is_top');
        var id = $(this).attr('dataid');
        var msg = $(this).html();
        layer.confirm("确定取消" + msg, {
            icon: 3
        }, (index) => {
            layer.close(index)

            var res = {
                id: id,
                is_top: is_top
            };
            var url = "{{url('admin/article-is_top')}}";
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
            return false;
        });
    });

    $('.status').click(function() {
        var status = $(this).attr('status');
        var id = $(this).attr('dataid');
        layer.confirm("确定更换状态", {
            icon: 3
        }, (index) => {
            layer.close(index)

            var res = {
                id: id,
                status: status
            };
            var url = "{{url('admin/article-status')}}";
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

    $('.delete').click(function() {
        var id = $(this).attr('dataid');
        var res = {
            "id": id
        };
        var url = '{{url("admin/article-delete")}}';
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