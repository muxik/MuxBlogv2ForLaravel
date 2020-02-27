<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use App\Models\System;
use App\Models\Article;
use Illuminate\Support\Facades\View;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $cates =  Cate::orderBy('sort')->get();
        $webInfo =  System::find(1);
        $articles = Article::orderBy('created_at', 'desc')->where(['is_top' => 1, 'status' => 1])->limit(10)->get();
        $vData = [
            'cates' => $cates,
            'webInfo' => $webInfo,
            'top_articles' => $articles
        ];
        View::share($vData);
    }
}