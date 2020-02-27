<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{$webInfo->webname}} | 念念不忘,必有回响</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <link rel="stylesheet" href="/assets/index/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/index/css/animate.css" />
    <link rel="stylesheet" href="/assets/index/css/index.css" />
</head>

<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">念念不忘,必有回响</a>
            </div>
            <div class="navbar-menu collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="/">首页</a></li>
                    @foreach ($cates as $vo)
                    <li><a href="{{url('index',['id' => $vo->id])}}">{{$vo->cate_name}}</a></li>
                    @endforeach
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">登录</a></li>
                    <li><a href="#">注册</a></li>
                    <li><a href="#">投稿</a></li>
                </ul>
                <form action="#" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" id="search" name="search" placeholder="搜索" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default btn-sm">搜索</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>