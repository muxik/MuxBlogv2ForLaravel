<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member as MemberModel;

class Member extends Controller
{
    // 会员信息列表
    public function info()
    {
        $members = (new MemberModel())->orderBy('created_at', 'desc')->paginate(10);
        $vData = [
            'members' => $members
        ];
        return view('admin.member.info', $vData);
    }

    // 会员添加
    public function add()
    {
        if (request()->isMethod('post')) {
            $data = request()->only(['username', 'password', 'nickname', 'email']);
            $result = (new MemberModel())->add($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '操作成功!',
                    'url'  => url('admin/member-list')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg'  => $result
                ];
            }
            return $msg;
        }
        return view('admin.member.add');
    }

    // 会员修改
    public function edit()
    {
        if (request()->isMethod('post')) {
            $data = request()->only(['id', 'password', 'nickname']);
            $result = (new MemberModel())->edit($data);

            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '修改成功!',
                    'url'  => url('admin/member-list')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg'  => $result
                ];
            }
            return $msg;
        }
        return view('admin.member.edit', ['memberInfo' => MemberModel::find(request('id'))]);
    }

    // 会员删除
    public function delete()
    {
        $memberInfo = MemberModel::with('articles')->find(request('id'));

        foreach ($memberInfo->articles as $vo) {
            $vo->delete();
        }
        $result = $memberInfo->delete();
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