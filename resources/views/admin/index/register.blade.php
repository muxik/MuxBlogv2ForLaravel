<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>注册</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/admin/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/assets/admin/css/weather-icons.min.css" rel="stylesheet" />
    <link id="beyond-link" href="/assets/admin/css/beyond.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="login-container">
        <div class="loginbox bg-white">
            <form>
                <div class="loginbox-title">注册</div>
                <div class="loginbox-or">
                    <div class="or-line"></div>
                </div>
                <div class="loginbox-textbox">
                    <input type="text" name="username" class="form-control" placeholder="用户名" />
                </div>
                <div class="loginbox-textbox">
                    <input type="password" name="password" class="form-control" placeholder="密码" />
                </div>
                <div class="loginbox-textbox">
                    <input type="password" name="conpass" class="form-control" placeholder="确认密码" />
                </div>
                <div class="loginbox-textbox">
                    <input type="text" name="nickname" class="form-control" placeholder="昵称" />
                </div>
                <div class="loginbox-textbox">
                    <input type="email" name="email" class="form-control" placeholder="邮箱" />
                </div>
                <div class="loginbox-forgot">
                    <a href="{{url('admin/forget')}}">忘记密码?</a>
                </div>
                <div class="loginbox-submit">
                    <input type="submit" class="btn btn-primary btn-block" value="登录">
                </div>
                <div class="loginbox-signup">
                    <a href="{{url('admin')}}">返回登录</a>
                </div>
            </form>
        </div>
    </div>

    <script src="/assets/admin/js/skins.min.js"></script>
    <!--Basic Scripts-->
    <script src="/assets/admin/js/jquery.min.js"></script>
    <script src="/assets/admin/js/bootstrap.min.js"></script>
    <script src="/assets/admin/js/slimscroll/jquery.slimscroll.min.js"></script>
    <!--Beyond Scripts-->
    <script src="/assets/admin/js/beyond.js"></script>
    <script src="/assets/admin/lib/layer/layer.js"></script>
    <script>
    $(window).bind("load", function() {

        /*Sets Themed Colors Based on Themes*/
        themeprimary = getThemeColorFromCss('themeprimary');
        themesecondary = getThemeColorFromCss('themesecondary');
        themethirdcolor = getThemeColorFromCss('themethirdcolor');
        themefourthcolor = getThemeColorFromCss('themefourthcolor');
        themefifthcolor = getThemeColorFromCss('themefifthcolor');

    });
    </script>
</body>
<!--  /Body -->

</html>

<script>
$('form').submit(function(e) {
    var res = $(this).serialize();
    var url = '{{url("admin/register")}}';
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