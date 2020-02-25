<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class Index extends Controller
{
    //登录操作
    public function login()
    {
        // 判断是否重复登录
        if (session()->has('admin')) {
            return redirect('admin/index');
        }
        if (request()->isMethod('post')) {
            $data = request()->only(['username', 'password']);
            $result = (new Admin())->login($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '登录成功!',
                    'url'  => url('admin/index')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg'  => $result
                ];
            }
            return $msg;
        }
        return view('admin.index.login');
    }

    // 注册操作
    public function register()
    {
        if (request()->isMethod('post')) {
            $data = request()->only(['username', 'password', 'conpass', 'nickname', 'email']);
            $result = (new Admin())->register($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '注册成功!',
                    'url'  => url('admin/index')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg'  => $result
                ];
            }
            return $msg;
        }
        return view('admin.index.register');
    }

    // 忘记密码
    public function forget()
    {
        if (request()->isMethod('post')) {
            // 接收数据交给模型
            $data = request()->only(['email', 'code', 'password', 'is_v']);
            $result = (new Admin())->getCode($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '验证码发送成功!!',
                ];
            } elseif ($result == 2) {
                $msg = [
                    'code' => 1,
                    'msg'  => '密码重置成功!!',
                    'url'  => url('admin')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg'  => $result,
                ];
            }
            return $msg;
        }
        return view('admin.index.forget');
    }
}