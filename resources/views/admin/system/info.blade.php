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
                        <i class="fa fa-home"></i>&nbsp;系统设置
                    </li>
                    <li>
                        网站修改
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
                                <span class="widget-caption">网站修改</span>
                            </div>
                            <div class="widget-body">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="catename"
                                            class="col-sm-2 control-label no-padding-right">网站名称</label>
                                        <div class="col-sm-6">
                                            <input value="{{$webInfo->webname}}" type="text" class="form-control"
                                                id="catename" name="webname" placeholder="网站名称" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sort" class="col-sm-2 control-label no-padding-right">版权信息</label>
                                        <div class="col-sm-6">
                                            <input value="{{$webInfo->copyright}}" type="text" class="form-control"
                                                id="sort" name="copyright" placeholder="版权信息" />
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

<script>
$(function() {
    $('form').submit(function(e) {
        var res = $(this).serialize();
        var url = '{{url("admin/system")}}';
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