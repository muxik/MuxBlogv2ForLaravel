<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use Validator;

class Cate extends Model
{
    // 软删除
    use SoftDeletes;

    // 改为可写字段
    protected $fillable = ['cate_name', 'sort'];

    // 时间戳
    protected $dateFormat = "U";

    // 时间戳转换
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // 关联文章模型
    public function articles()
    {
        return $this->hasMany('App\\Models\\Article', 'cate_id', 'id');
    }

    // 栏目添加
    public function add($data)
    {
        $rule = [
            'cate_name' => 'bail|required|unique:cates',
            'sort'      => 'required|integer'
        ];
        $msg = [
            'cate_name.required' => '栏目名称不能为空',
            'cate_name.unique' => '栏目已存在',
            'sort.required'      => '排序不能为空',
            'sort.integer'      => '请使用数字排序'
        ];
        $validator = Validator::make($data, $rule, $msg);
        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        $result = $this->create($data);
        if ($result) {
            return 1;
        } else {
            return '服务器错误,添加失败!';
        }
    }

    // 栏目修改
    public function edit($data)
    {
        $rule = [
            'cate_name' => [
                'bail',
                'required',
                Rule::unique('cates')->ignore($data['id'])
            ],
            'sort'      => 'required|integer'
        ];
        $msg = [
            'cate_name.required' => '栏目名不能为空',
            'cate_name.unique'   => '栏目名已存在',
            'sort.required'      => '排序不能为空',
            'sort.integer'       => '值必须是数字'
        ];
        $validator = Validator::make($data, $rule, $msg);
        if ($validator->fails()) {
            return $validator->errors()->first();
        }
        // 更新
        $cateInfo = $this->find($data['id']);
        $cateInfo->cate_name = $data['cate_name'];
        $cateInfo->sort = $data['sort'];

        $result = $cateInfo->save();
        if ($result) {
            return 1;
        } else {
            return "服务器错误,修改失败!";
        }
    }

    // 栏目排序
    public function sort($data)
    {
        $rule = [
            'sort' => 'required|integer'
        ];
        $msg = [
            'sort.required' => '排序不能为空',
            'sort.integer' => '值必须是数字'
        ];
        $validator = Validator::make($data, $rule, $msg);

        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        // 更新
        $cateInfo = $this->find($data['id']);
        $cateInfo->sort = $data['sort'];

        $result = $cateInfo->save();
        if ($result) {
            return 1;
        } else {
            return '服务器错误,排序失败!';
        }
    }
}