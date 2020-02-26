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
                        <i class="fa fa-home"></i>&nbsp;文章管理
                    </li>
                    <li>
                        文章修改
                    </li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->
            <!-- Page Body -->
            <div class="page-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="widget radius-bordered">
                            <div class="widget-header bordered-bottom bordered-themeprimary">
                                <span class="widget-caption">文章修改</span>
                            </div>
                            <div class="widget-body">
                                <form class="form-horizontal">
                                    <input type="hidden" name="id" value="{{$articleInfo->id}}">
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label no-padding-right">文章名称</label>
                                        <div class="col-sm-6">
                                            <input value="{{$articleInfo->title}}" type="text" class="form-control"
                                                id="title " name="title" placeholder="文章名称" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tags" class="col-sm-2 control-label no-padding-right">文章标签</label>
                                        <div class="col-sm-6">
                                            <input value="{{$articleInfo->tags}}" type="text" class="form-control"
                                                id="tags" name="tags" placeholder="文章标签" />
                                            <p class="help-block">用|分开</p>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="member_id" class="control-label col-sm-2">作者</label>
                                        <div class="col-sm-6">
                                            <select name="member_id" class="form-control">
                                                <option value="{{$articleInfo->member_id}}">
                                                    {{$articleInfo->members->nickname}}
                                                </option>
                                                @foreach ($members as $vo)
                                                <option value="{{$vo->id}}">{{$vo->nickname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cate_id" class="control-label col-sm-2">所属导航</label>
                                        <div class="col-sm-6">
                                            <select name="cate_id" class="form-control">
                                                <option value="1">请选择</option>
                                                @foreach ($cates as $vo)
                                                <option value="{{$vo->id}}" @if ($vo->id == $articleInfo->member_id)
                                                    selected @endif>{{$vo->cate_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sort" class="col-sm-2 control-label no-padding-right">文章简介</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="desc" cols="20"
                                                rows="10">{{$articleInfo->desc}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sort" class="col-sm-2 control-label no-padding-right">文章内容</label>
                                        <div class="col-sm-6">
                                            <textarea name="content" id="mytextarea" cols="30"
                                                rows="10">{{$articleInfo->content}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">修改</button>
                                        </div>
                                    </div>
                                </form>
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
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
$(function() {
    tinymce.init({
        selector: '#mytextarea'
    });

    $('.pagination').addClass('pagination-sm');

    $('form').submit(function(e) {
        var res = $(this).serialize();
        var url = '{{url("admin/article-edit")}}';
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
</script>

</body>
<!--  /Body -->

</html>