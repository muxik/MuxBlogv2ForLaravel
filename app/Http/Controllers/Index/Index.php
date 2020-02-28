<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\IndexController;
use App\Models\Article;
use App\Models\Cate;
use App\Models\Comment;
use App\Models\Member;

class Index extends IndexController
{
    public function index()
    {
        $where = [];
        $cate_name = null;

        if (request('id')) {
            $where = ['cate_id' => request('id')];
            $cate_name = Cate::where('id', request('id'))->value('cate_name');
        }

        $articles =  Article::with('members')->where('status', 1)->where($where)->paginate(5);
        $vData = [
            'articles' => $articles,
            'cate_name' => $cate_name
        ];
        return view('index.index.index', $vData);
    }

    // 文章详情页
    public function info()
    {
        $click = (new Article())->where('id', request('id'))->first();
        $click->click += 1;
        $click->save();

        $articleInfo = Article::with('comments')->find(request('id'));
        return view('index.index.info', ['articleInfo' => $articleInfo]);
    }

    // 用户注册
    public function register()
    {
        if (request()->isMethod('post')) {
            $data = request()->only(['username', 'nickname', 'email', 'password', 'conpass', 'verify']);
            $result = (new Member())->register($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '注册成功!',
                    'url'  => url('/')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg' => $result
                ];
            }
            return $msg;
        }
        return view('index.index.register');
    }

    // 用户登录
    public function login()
    {
        if (request()->isMethod('post')) {
            $data = request()->only(['username', 'password', 'verify']);
            $result = (new Member())->login($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  =>  '登录成功!',
                    'url'  =>  url('/')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg'  => $result
                ];
            }
            return $msg;
        }
        return view('index.index.login');
    }

    // 退出登录
    public function login_out()
    {
        $msg = [
            'code' => 1,
            'msg'  => '再见!',
            'url'  => " "
        ];
        $result = session()->flush();
        return $result == null ? $msg : ['code' => 0, 'msg' => '服务器错误!'];
    }

    // 投稿
    public function contribute()
    {
        if (request()->isMethod('post')) {
            $data = request()->only(['title', 'tags', 'desc', 'content', 'member_id', 'cate_id']);
            $result = (new Article())->add($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '投稿成功成功!,等待审核!',
                    'url'  => url('/')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg'  => $result
                ];
            }
            return $msg;
        }
        $cates = (new Cate())->all();
        $vData = [
            'cates' => $cates
        ];
        return view('index.index.contribute', $vData);
    }

    // 评论
    public function comm()
    {
        if (!session()->has('user')) {
            return ['code' => '0', 'msg' => '你还没有登录'];
        }
        $data = request()->only(['article_id', 'member_id', 'content']);
        $result = (new Comment())->comm($data);
        if ($result == 1) {
            $msg = [
                'code' => 1,
                'url'  => '',
                'msg'  => '评论成功!',
            ];
        } else {
            $msg = [
                'code' => 0,
                'msg'  => $result
            ];
        }
        return $msg;
    }

    // 搜索
    public function search()
    {
        $cate_name = request('search');

        $articles =  Article::with('members')->where('status', 1)->where('title', 'like', '%' . request('search') . '%')->paginate(5);
        $vData = [
            'articles' => $articles,
            'cate_name' => $cate_name
        ];
        return view('index.index.index', $vData);
    }
}