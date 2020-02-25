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
                    <li>
                        会员修改
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
                                <span class="widget-caption">会员修改</span>
                            </div>
                            <div class="widget-body">
                                <form class="form-horizontal">
                                    <input type="hidden" name="id" value="{{$memberInfo->id}}">
                                    <div class="form-group">
                                        <label for="username"
                                            class="col-sm-2 control-label no-padding-right">会员帐号</label>
                                        <div class="col-sm-6">
                                            <input disabled value="{{$memberInfo->username}}" type="text"
                                                class="form-control" id="username" name="username"
                                                placeholder="会员帐号名" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nickname"
                                            class="col-sm-2 control-label no-padding-right">会员昵称</label>
                                        <div class="col-sm-6">
                                            <input value="{{$memberInfo->nickname}}" type="text" class="form-control"
                                                id="nickname" name="nickname" placeholder="会员昵称" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password"
                                            class="col-sm-2 control-label no-padding-right">会员密码</label>
                                        <div class="col-sm-6">
                                            <input value="{{$memberInfo->password}}" type="password"
                                                class="form-control" id="password" name="password" placeholder="会员密码" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label no-padding-right">会员邮箱</label>
                                        <div class="col-sm-6">
                                            <input disabled value="{{$memberInfo->email}}" type="email"
                                                class="form-control" id="email" name="email" placeholder="会员邮箱" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">保存</button>
                                        </div>
                                    </div>
                            </div>
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
$('form').submit(function(e) {
    var res = $(this).serialize();
    var url = '{{url("admin/member-edit")}}';
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
</script>
</body>
<!--  /Body -->

</html>