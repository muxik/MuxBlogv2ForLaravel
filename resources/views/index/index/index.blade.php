@include('index.public.__head')
<div class="container">
    <div class="jumbotron">
        <h1 class="animated fadeInDown">Hello Word!</h1>
        <p class="animated shake">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident nemo harum maxime
            maiores aliquid! Commodi facilis dolorem magnam quod eveniet?</p>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="page-header h3">{{$cate_name or "博文"}}列表</div>
            <div class="article-list">
                @foreach($articles as $vo)
                <div class="article-list-item">
                    <a href="{{url('info' , ['id'=>$vo->id])}}" class="title">{{$vo->title}}</a>
                    <div class="info">
                        <span class="author">作者：{{$vo->members->nickname}}</span>-
                        <span class="time">发布时间：{{$vo->created_at}}</span>-
                        <span class="read">阅读：{{$vo->click}}</span>-
                        <span class="comment">评论：{{$vo->comm_num}}</span>
                    </div>
                </div>
                @endforeach
            </div>
            <nav class="">
                {!!strToElement($articles->links())!!}
            </nav>
        </div>
        @include('index.public.__foot')