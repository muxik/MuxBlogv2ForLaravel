<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    // 软删除
    use SoftDeletes;

    // 改为可写字段
    protected $fillable = ['username', 'password', 'nickname', 'email'];

    // 时间戳
    protected $dateFormat = "U";

    // 时间戳转换
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // 关联文章模型
    public function articles()
    {
        return $this->hasMany('App\\Models\\Article', 'member_id', 'id');
    }

    public function add($data)
    {
        // 验证规则
        $rule = [
            'username' => 'bail|required|unique:admins',
            'nickname' => 'required',
            'password' => 'required',
            'email'    => 'required|email|unique:admins',
        ];
        $msg = [
            'username.required' => "用户名不能为空",
            'username.unique'   => "用户名已存在",
            'nickname.required' => "昵称不能为空",
            'password.required' => "密码不能为空",
            'email.required'    => "邮箱不能为空",
            'email.email'       => "邮箱格式不正确",
            'email.unique'      => "邮箱已存在"
        ];

        $validator = Validator::make($data, $rule, $msg);
        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        // 保存
        $result = $this->create($data);
        if ($result) {
            return 1;
        } else {
            return "服务器错误";
        }
    }

    // 修改
    public function edit($data)
    {
        $rule = [
            'password' => 'bail|required',
            'nickname' => 'required'
        ];
        $msg = [
            'password.required' => '密码不能为空',
            'nickname.required' =>  '昵称不能为空'
        ];

        $validator = Validator::make($data, $rule, $msg);
        if ($validator->fails()) {
            return $validator->errors()->first();
        }
        // 查询保存
        $adminInfo = $this->find($data['id']);
        $adminInfo->password = $data['password'];
        $adminInfo->nickname = $data['nickname'];
        $result = $adminInfo->save();

        if ($result) {
            return 1;
        } else {
            return "修改失败!";
        }
    }
}