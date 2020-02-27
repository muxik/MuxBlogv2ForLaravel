<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\IndexController;
use App\Models\Article;
use App\Models\Cate;

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
}