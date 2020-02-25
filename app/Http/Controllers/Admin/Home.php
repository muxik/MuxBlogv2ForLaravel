<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Home extends Controller
{
    //首页
    public function index()
    {
        return view('admin.home.index');
        // return dd(request()->server());
    }

    // 退出登录
    public function login_out()
    {
        $result = session()->flush();
        if (!$result) {
            $smg = [
                'code' => 1,
                'msg'  => '退出成功!',
                'url'  => url('admin')
            ];
        } else {
            $smg = [
                'code' => 0,
                'msg'  => '退出失败!'
            ];
        }
        return $smg;
    }
}