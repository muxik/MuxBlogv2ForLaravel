@include('index.public.__head')
<div class="container">
    <div class="content center-block animated fadeInDown">
        <div class="page-header h1">用户注册</div>
        <form action="#">
            <div class="form-group">
                <label for="username" class="control-label">用户名</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="填写用户名" />
            </div>
            <div class="form-group">
                <label for="nickname" class="control-label">昵称</label>
                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="填写昵称" />
            </div>
            <div class="form-group">
                <label for="email" class="control-label">邮箱</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="填写邮箱" />
            </div>
            <div class="form-group">
                <label for="password" class="control-label">密码</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="填写密码" />
            </div>
            <div class="form-group">
                <label for="conpass" class="control-label">确认密码</label>
                <input type="password" class="form-control" id="conpass" name="conpass" placeholder="确认密码" />
            </div>

            <div class="form-group">
                <label for="verify" class="control-label">验证码</label>
                <div class="input-group">
                    <input type="text" class="form-control {{ $errors->has('captcha') ? ' is-invalid' : '' }}"
                        id="verify" name="verify" placeholder="验证码" />

                    <span class="input-group-addon">
                        <img src="{{ captcha_src('flat') }}" onclick="this.src='/index.php/captcha/flat?'+Math.random()"
                            title="点击图片重新获取验证码">
                    </span>
                    @if ($errors->has('captcha'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('captcha') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block">注册</button>
            </div>


        </form>
    </div>
    <div class="bottom center-block animated fadeInUp">
        Copyright 2018 {{$webInfo->copyright}} All Rights Reserved
    </div>
</div>

<script src="/assets/index/js/jquery-3.3.1.min.js"></script>
<script src="/assets/index/js/bootstrap.min.js"></script>
<script src="/assets/admin/lib/layer/layer.js"></script>
</body>

<script>
$('form').submit(function(e) {
    var res = $(this).serialize();
    var url = '{{url("register")}}';
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

</html>