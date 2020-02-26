<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\System as SystemModel;

class System extends Controller
{
    // 系统设置
    public function info()
    {
        if (request()->isMethod('post')) {
            $data  = request()->only(['webname', 'copyright']);
            $result = (new SystemModel())->edit($data);
            if ($result == 1) {
                $msg = [
                    'code' => 1,
                    'msg' => '修改成功!',
                    'url' => ''
                ];
            } else {
                $msg = [
                    'code' => 0,
                    'msg' => $result
                ];
            }
            return $msg;
        }
        return view('admin.system.info', ['webInfo' => (new SystemModel())->first()]);
    }
}