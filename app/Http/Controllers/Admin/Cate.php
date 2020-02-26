<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate as CateModel;

class Cate extends Controller
{
    // 栏目详情列表
    public function info()
    {
        // 模板渲染
        $cates = CateModel::orderBy('sort', 'asc')->paginate();
        $vData = [
            'cates' => $cates
        ];
        return view('admin.cate.info', $vData);
    }

    // 栏目添加
    public function add()
    {
        if (request()->isMethod('post')) {
            $data = request()->only(['cate_name', 'sort']);
            $result = (new CateModel())->add($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '添加成功',
                    'url'  => url('admin/cate-list')
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg'  => $result
                ];
            }
            return $msg;
        }
        return view('admin.cate.add');
    }

    // 栏目修改 
    public function edit()
    {
        if (request()->isMethod('post')) {
            $data = request()->only(['id', 'cate_name', 'sort']);
            $result = (new CateModel())->edit($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg'  => '操作成功!',
                    'url'  => url('admin/cate-list')
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
        $cateInfo = CateModel::find(request('id'));
        $vData    = [
            'cateInfo' => $cateInfo
        ];
        return view('admin.cate.edit', $vData);
    }

    // 栏目删除
    public function delete()
    {
        $cateInfo = CateModel::with('articles')->find(request('id'));

        foreach ($cateInfo->articles as $vo) {
            $vo->delete();
        }

        $result = $cateInfo->delete();
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

    // 栏目排序
    public function sort()
    {
        $data = request()->only(['id', 'sort']);
        $result = (new CateModel())->sort($data);
        if ($result == 1) {
            $msg = [
                'code' => 1,
                'msg'  => '操作成功!',
                'url'  => ''
            ];
        } else {
            $msg = [
                'code' => 0,
                'msg'  => $result
            ];
        }
        return $msg;
    }
}