<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment as CommentModel;

class Comment extends Controller
{
    // 评论列表信息
    public function info()
    {
        $comments = CommentModel::with('articles', 'members')->orderBy('created_at', 'desc')->paginate(10);
        $vData = [
            'comments' => $comments
        ];
        return view('admin.comment.info', $vData);
    }

    // 评论删除
    public function delete()
    {
        $commentInfo = CommentModel::find(request('id'));

        $result = $commentInfo->delete();
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