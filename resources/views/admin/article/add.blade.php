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
                        文章添加
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
                                <span class="widget-caption">文章添加</span>
                            </div>
                            <div class="widget-body">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="catename"
                                            class="col-sm-2 control-label no-padding-right">文章名称</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="catename" name="cate_name"
                                                placeholder="文章名称" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sort" class="col-sm-2 control-label no-padding-right">文章排序</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="sort" name="sort"
                                                placeholder="文章排序" />
                                            <p class="help-block">数字越大越靠后</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea style="display:none;">### 关于 Editor.md

                                    **Editor.md** 是一款开源的、可嵌入的 Markdown 在线编辑器（组件），基于 CodeMirror、jQuery 和 Marked 构建。
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">添加</button>
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
<script src="/assets/editormd/editormd.js"></script>
<script>
$(function() {

    var editor = editormd("test-editor", {
        // width  : "100%",
        // height : "100%",
        path: "editormd/lib/"
    });

    $('.pagination').addClass('pagination-sm');

    $('form').submit(function(e) {
        var res = $(this).serialize();
        var url = '{{url("admin/cate-add")}}';
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