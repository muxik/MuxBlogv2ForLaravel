@include('index.public.__head')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <h1 class="article-title">{{$articleInfo->title}}</h1>
            <div class="status">{{$articleInfo->click}}阅读-{{$articleInfo->comm_num}}评论-作者：赏金
                @foreach( explode("|",$articleInfo->tags) as $vo)
                <span class="label label-default">{{$vo}}</span>
                @endforeach
            </div>
            <div class="article-content">
                <blockquote>
                    {{$articleInfo->desc}}
                </blockquote>
                <p>
                    {!!$articleInfo->content!!}
                </p>
            </div>
            <div class="article-comment">
                <div class="page-header"><b>相关评论</b></div>
                <div class="comment-content">
                    <form action="#">
                        <input type="hidden" name="article_id" value="{{$articleInfo->id}}">
                        <input type="hidden" name="member_id" value="{{session('user.id')}}">
                        <div class="form-group">
                            <textarea class="form-control" id="comment" name="content" rows="5" cols=""></textarea>
                        </div>
                        <div class="form-group pull-right">
                            <button class="btn btn-primary">评论（请认真评论）</button>
                        </div>
                    </form>
                </div>
                @foreach($articleInfo->comments as $vo)
                <div class="clearfix"></div>
                <div class="comment-list">
                    <div class="comment-list-item">
                        <div class="info">{{$vo->members->nickname}}<small>{{$vo->created_at}}</small></div>
                        <div class="content">{{$vo->content}}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @include('index.public.__foot')

        <script>
        $(function() {
            $('form').submit(function(e) {
                var res = $(this).serialize();
                var url = '{{url("comm")}}';
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