@include('admin.public.__head')

<!-- Main Container -->
<div class="main-container container-fluid">
    <!-- Page Container -->
    <div class="page-container">

        <!-- Page Sidebar -->
        @include('admin.public.__left');
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i>&nbsp;控制面板
                    </li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->
            <!-- Page Body -->
            <div class="page-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="well bordered-left bordered-themeprimary">
                            <h1>
                                不忘初心,方得始终
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="well with-header with-footer">
                            <div class="header bg-themeprimary">
                                服务器信息
                            </div>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">服务器信息</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>服务器域名</td>
                                        <td><a
                                                href="//{{request()->server()['SERVER_NAME']}}">{{request()->server()['SERVER_NAME']}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>服务器IP地址</td>
                                        <td>{{request()->server()['SERVER_ADDR']}}</td>
                                    </tr>
                                    <tr>
                                        <td>服务器端口</td>
                                        <td>{{request()->server()['SERVER_PORT']}}</td>
                                    </tr>
                                    <tr>
                                        <td>拜师QQ</td>
                                        <td>305530751</td>
                                    </tr>
                                    <tr>
                                        <td>联系邮箱</td>
                                        <td>muxikf4@gmail.com</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="footer">QQ:669150007</div>
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

@include('admin.public.__js');
</body>
<!--  /Body -->

</html>