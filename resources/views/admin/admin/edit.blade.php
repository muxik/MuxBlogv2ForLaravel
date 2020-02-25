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
                    <li>
                        管理员修改
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
                                <span class="widget-caption">管理员修改</span>
                            </div>
                            <div class="widget-body">
                                <form class="form-horizontal">
                                    <input type="hidden" name="id" value="{{$adminInfo->id}}">
                                    <div class="form-group">
                                        <label for="username"
                                            class="col-sm-2 control-label no-padding-right">管理员帐号</label>
                                        <div class="col-sm-6">
                                            <input value="{{$adminInfo->username}}" disabled type="text"
                                                class="form-control" id="username" name="username"
                                                placeholder="管理员帐号名" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nickname"
                                            class="col-sm-2 control-label no-padding-right">管理员昵称</label>
                                        <div class="col-sm-6">
                                            <input value="{{$adminInfo->nickname}}" type="text" class="form-control"
                                                id="nickname" name="nickname" placeholder="管理员昵称" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="oldpass"
                                            class="col-sm-2 control-label no-padding-right">管理员原密码</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" id="oldpass" name="oldpass"
                                                placeholder="请输入原密码" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="newpass"
                                            class="col-sm-2 control-label no-padding-right">管理员新密码</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" id="newpass" name="newpass"
                                                placeholder="请输入新密码" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label no-padding-right">管理员邮箱</label>
                                        <div class="col-sm-6">
                                            <input disabled value="{{$adminInfo->email}}" type="email"
                                                class="form-control" id="email" name="email" placeholder="管理员邮箱" />
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
$(function() {
    $('form').submit(function(e) {
        var res = $(this).serialize();
        var url = '{{url("admin/admin-edit")}}';
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