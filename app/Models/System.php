<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class System extends Model
{
    // 表名
    protected $table = 'system';

    // 改为可写字段
    protected $fillable = ['webname', 'copyright'];

    // 时间戳
    protected $dateFormat = "U";

    // 时间戳转换
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function edit($data)
    {
        $rule = [
            'webname' => 'bail|required',
            'copyright' => 'required'
        ];
        $msg = [
            'webname.required' => '网站名称不能为空',
            'copyright.required' => '版权信息不能为空'
        ];

        $validator = Validator::make($data, $rule, $msg);
        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        $webInfo = $this->first();
        $webInfo->webname = $data['webname'];
        $webInfo->copyright = $data['copyright'];
        $result = $webInfo->save();
        if ($result) {
            return 1;
        } else {
            return "服务器错误修改失败";
        }
    }
}