<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Admin extends Model
{
    // 改为可写字段
    protected $fillable = ['username', 'password', 'nickname', 'email'];

    // 时间戳
    protected $dateFormat = "U";

    // 时间戳转换
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    //登录处理
    public function login($data)
    {
        $rule = [
            'username' => 'bail|required',
            'password' => 'required'
        ];

        $msg = [
            'username.required' => '帐号不能为空',
            'password.required' => '密码不能为空'
        ];

        $validator = Validator::make($data, $rule, $msg);

        if ($validator->fails()) {
            return $validator->errors()->first();
        }
        // 查询结果
        $result = $this->where($data)->first();
        // 判断登录状态
        if ($result['status'] != 1) {
            return "帐号被禁用";
        }

        /**
         * 登录成功保存session 返回1
         * 登录失败返回错误信息
         * @var $result
         */
        if ($result) {
            $sessionData = [
                'id' => $result['id'],
                'nickname' => $result['nickname'],
                'is_super' => $result['is_super']
            ];
            session(['admin' => $sessionData]);

            return 1;
        } else {
            return "注册失败!";
        }
    }

    /** 
     * 管理员注册
     */
    public function register($data)
    {
        // -----验证操作------
        $rule = [
            'username' => 'bail|required|unique:admins',
            'password' => 'required',
            'conpass'  => 'required|same:password',
            'nickname' => 'required',
            'email'    => 'required|unique:admins',
        ];

        $msg = [
            'username.required' => '用户名不能为空!',
            'username.unique'   => '用户名以存在!',
            'password.required' => '密码不能为空',
            'conpass.required'  => '确认密码不能为空',
            'conpass.same'      => '两次密码不一致',
            'nickname.required' => '昵称不能为空',
            'email.required'    => '邮箱不能为空',
            'email.unique'      => '邮箱已经存在',
        ];

        $validator = Validator::make($data, $rule, $msg);
        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        // ------添加操作-------
        $result = $this->create($data);
        if ($result) {
            return 1;
        } else {
            return "服务器错误,注册失败!";
        }
    }

    /**
     * 重置密码
     */
    public function getCode($data)
    {
        $role = [
            'email' => 'bail|required|email'
        ];

        $msg = [
            'email.required' => '邮箱不能为空!',
            'email.email'    => '邮箱格式不正确'
        ];

        // 判断操作是发送验证码还是重置密码
        if ($data['is_v'] == 1) {
            // 添加验证规则
            $role['code']     = 'required';
            $role['password'] = 'required';

            $msg['code.required']     = '验证码不能为空';
            $msg['password.required'] = '新密码不能为空';

            // 验证新规则
            $validator = Validator::make($data, $role, $msg);
            if ($validator->fails()) {
                return $validator->errors()->first();
            }

            // 验证 code 更新密码
            if ($data['code'] != session('code')) {
                return "验证码不正确";
            }
            $adminInfo = $this->where('email', $data['email'])->first();
            $adminInfo->password = $data['password'];
            $result = $adminInfo->save();

            // 判断是否更新成功 如果是返回成功信息
            if ($result) {
                return 2;
            } else {
                return "服务器错误!";
            }
        } else {

            // 验证邮箱
            $validator = Validator::make($data, $role, $msg);
            if ($validator->fails()) {
                return $validator->errors()->first();
            }
            // 验证码操作
            $result = $this->where('email', $data['email'])->first();
            if ($result) {
                // 生成验证码后保存session 并发送邮件 
                $code = mt_rand(10000, 99999);
                session(['code' => $code]);
                $sendResult = mailto($data['email'], '[Muxi_k] 重置密码验证码', '您的验证码为:' . $code);
                if ($sendResult) {
                    return 1;
                } else {
                    return "验证码发生失败";
                }
            } else {
                return "该邮箱尚未注册!";
            }
        }
    }
}