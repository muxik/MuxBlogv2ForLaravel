<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>登录操作</title>
    <link rel="shortcut icon" href="/assets/admin/img/logo.jpg" type="image/x-icon">
    <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/admin/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/assets/admin/css/weather-icons.min.css" rel="stylesheet" />
    <link id="beyond-link" href="/assets/admin/css/beyond.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="login-container">
        <div class="loginbox bg-white">
            <div class="loginbox-title">登录</div>

            <div class="loginbox-or">
                <div class="or-line"></div>
            </div>
            <div class="loginbox-textbox">
                <input type="text" class="form-control" placeholder="用户名" />
            </div>
            <div class="loginbox-textbox">
                <input type="text" class="form-control" placeholder="密码" />
            </div>
            <div class="loginbox-forgot">
                <a href="">忘记密码?</a>
            </div>
            <div class="loginbox-submit">
                <input type="button" class="btn btn-primary btn-block" value="Login">
            </div>
            <div class="loginbox-signup">
                <a href="#">注册账户</a>
            </div>
        </div>
        <div class="logobox">
            <p class="text-center"
                style="font-size: 18px;font-weight: bold;text-shadow: 3px 3px 3px #FF0000;font-style: italic;">万动力</p>
        </div>
    </div>

    <script src="/assets/admin/js/skins.min.js"></script>
    <!--Basic Scripts-->
    <script src="/assets/admin/js/jquery.min.js"></script>
    <script src="/assets/admin/js/bootstrap.min.js"></script>
    <script src="/assets/admin/js/slimscroll/jquery.slimscroll.min.js"></script>
    <!--Beyond Scripts-->
    <script src="/assets/admin/js/beyond.js"></script>
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
    
</script>