<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article as ArticleModel;

class Article extends Controller
{
    // 文章信息列表
    public function info()
    {
        // 模板赋值
        $articles = ArticleModel::orderBy('is_top')->with('members', 'cates')->orderBy('status')->orderBy('created_at')->paginate(10);
        $vData = [
            'articles' => $articles
        ];
        return view('admin.article.info', $vData);
    }

    // 文章推荐
    public function is_top()
    {
        $articleInfo = ArticleModel::find(request('id'));

        $articleInfo->is_top = request('is_top') ? '0' : 1;
        $result = $articleInfo->save();

        if ($result) {
            $msg = [
                'code' => 1,
                'msg'  => "操作成功!",
                'url'  => ""
            ];
        } else {
            $msg = [
                'code' => 0,
                'msg'  => "操作失败!",
                'url'  => ""
            ];
        }
        return $msg;
    }

    // 文章状态
    public function status()
    {
        $articleInfo = ArticleModel::find(request('id'));

        $articleInfo->status = request('status') ? '0' : 1;
        $result = $articleInfo->save();

        if ($result) {
            $msg = [
                'code' => 1,
                'msg'  => "操作成功!",
                'url'  => ""
            ];
        } else {
            $msg = [
                'code' => 0,
                'msg'  => "操作失败!",
                'url'  => ""
            ];
        }
        return $msg;
    }

    // 添加文章
    public function add()
    {
        if (request()->isMethod('post')) {
        }
    }
}