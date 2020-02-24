<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Index extends Controller
{
    //登录
    public function login()
    {
        return view('admin.index.login');
    }
}