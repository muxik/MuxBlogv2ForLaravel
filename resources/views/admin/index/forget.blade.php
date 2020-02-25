<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>忘记密码</title>
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
                <div class="loginbox-title">忘记密码</div>
                <div class="loginbox-or">
                    <div class="or-line"></div>
                </div>
                <input type="hidden" name="is_v">
                <div class="loginbox-textbox">
                    <input type="email" name="email" class="form-control" placeholder="邮箱" />
                </div>

                <div class="loginbox-textbox hidden">
                    <input type="text" name="code" class="form-control" placeholder="验证码" />
                </div>
                <div class="loginbox-textbox hidden">
                    <input type="password" name="password" class="form-control" placeholder="密码" />
                </div>

                <div class=" loginbox-submit">
                    <input type="submit" class="btn btn-primary btn-block" value="获取验证码">
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
    var url = '{{url("admin/forget")}}';
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
                    $('input[name="is_v"]').val(1);
                    $('input[name="email"]').parent().addClass('hidden')
                    $('input[name="code"]').parent().removeClass('hidden')
                    $('input[name="password"]').parent().removeClass('hidden')
                    if (data.url) {
                        location.href = data.url;
                    }
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