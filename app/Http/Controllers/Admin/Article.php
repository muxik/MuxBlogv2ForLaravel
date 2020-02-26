<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article as ArticleModel;
use App\Models\Cate;
use App\Models\Member;

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
            $data = request()->only(['title', 'tags', 'desc', 'content', 'member_id', 'cate_id']);
            $result = (new ArticleModel())->add($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '添加成功!',
                    'url'  => url('admin/article-list')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg'  => $result
                ];
            }
            return $msg;
        }
        // 模板赋值
        $cates = (new Cate())->all();
        $members = (new Member())->all();
        $vData = [
            'cates' => $cates,
            'members' => $members
        ];
        return view('admin.article.add', $vData);
    }

    // 修改文章
    public function edit()
    {
        if (request()->isMethod('post')) {
            $data = request()->only(['id', 'title', 'tags', 'desc', 'content', 'member_id', 'cate_id']);
            $result = (new ArticleModel())->edit($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '修改成功!',
                    'url'  => url('admin/article-list')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg'  => $result
                ];
            }
            return $msg;
        }
        $articleInfo = ArticleModel::orderBy('is_top')->with('members', 'cates')->find(request('id'));
        $cates = (new Cate())->all();
        $members = (new Member())->all();
        $vData = [
            'cates' => $cates,
            'members' => $members,
            'articleInfo' => $articleInfo
        ];
        return view('admin.article.edit', $vData);
    }

    // 删除文章
    public function delete()
    {
        $articleInfo = ArticleModel::find(request('id'));

        $result = $articleInfo->delete();
        if ($result) {
            $msg = [
                'code' => 1,
                'msg'  => '删除成功',
                'url'  => ""
            ];
        } else {
            $msg = [
                'code' => 0,
                'msg'  => '服务器错误,删除失败!'
            ];
        }
        return $msg;
    }
}