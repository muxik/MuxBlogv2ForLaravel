<div class="col-sm-12 col-md-4 up">
    <div class="page-header h3">推荐文章</div>
    <div class="topic-list">
        @foreach ($top_articles as $vo)
        <div class="topic-list-item">
            <a href="{{url('info',['id' => $vo->id])}}" class="title">{{$vo->title}}</a>
        </div>
        @endforeach
    </div>
</div>
</div>
</div>
<div class="footer">
    <p>Copyright 2018 <a href="{{$webInfo->copyright}}">{{$webInfo->copyright}}</a> All Rights Reserved</p>
</div>

<script src="/assets/index/js/jquery-3.3.1.min.js"></script>
<script src="/assets/index/js/bootstrap.min.js"></script>
<script src="/assets/admin/lib/layer/layer.js"></script>
</body>

<script>
$('#login_out').click(function() {
    $.post({
        url: "{{url('login_out')}}",
        success: function(data) {
            if (data.code == 1) {
                layer.alert(data.msg, {
                    icon: 1
                }, (index) => {
                    layer.close(index);
                    location.href = data.url;
                });
            } else {
                layer.alert(data.msg, {
                    icon: 2
                }, (index) => {
                    layer.close(index);
                });
            }
        }
    });
});
</script>

</html>