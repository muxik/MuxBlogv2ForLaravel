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
                        <div class="form-group">
                            <textarea class="form-control" id="comment" name="comment" rows="5" cols=""></textarea>
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