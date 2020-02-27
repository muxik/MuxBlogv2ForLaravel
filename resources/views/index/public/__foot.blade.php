<div class="col-sm-12 col-md-4">
    <div class="page-header h3">推荐文章</div>
    <div class="topic-list">
        @foreach ($top_articles as $vo)
        <div class="topic-list-item">
            <a href="#" class="title">{{$vo->title}}</a>
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
</body>

</html>