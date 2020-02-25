<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin as AdminModel;

class Admin extends Controller
{
    // 管理员信息列表
    public function info()
    {
        $admins = AdminModel::orderBy('is_super', 'asc')->orderBy('status')->paginate(8);
        $vData =  [
            'admins' => $admins
        ];
        return view('admin.admin.info', $vData);
    }

    // 管理员状态操作
    public function status()
    {
        $adminInfo = AdminModel::find(request('id'));

        $adminInfo->status = request('status') ? '0' : 1;
        $result = $adminInfo->save();

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

    // 管理员添加
    public function add()
    {
        if (request()->isMethod('post')) {
            $data = request()->only(['username', 'nickname', 'password', 'email']);
            $result = (new AdminModel())->add($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '操作成功!',
                    'url'  => url('admin/admin-list')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg'  => $result
                ];
            }
            return $msg;
        }

        return view('admin.admin.add');
    }

    //管理员修改
    public function edit()
    {
        if (request()->isMethod('post')) {
            $data = request()->only(['id', 'oldpass', 'newpass', 'nickname']);
            $result = (new AdminModel())->edit($data);

            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '修改成功!',
                    'url'  => url('admin/admin-list')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg'  => $result
                ];
            }
            return $msg;
        }

        return view('admin.admin.edit', ['adminInfo' => AdminModel::find(request('id'))]);
    }

    // 管理员删除
    public function delete()
    {
        $adminInfo = AdminModel::find(request('id'));

        $result = $adminInfo->delete();
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