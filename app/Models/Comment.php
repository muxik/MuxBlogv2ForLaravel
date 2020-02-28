<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Comment extends Model
{
    // 软删除
    use SoftDeletes;

    // 改为可写字段
    protected $fillable = ['content', 'article_id', 'member_id'];

    // 时间戳
    protected $dateFormat = "U";

    // 时间戳转换
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // 关联文章模型
    public function articles()
    {
        return $this->belongsTo('App\\Models\\Article', 'article_id', 'id');
    }

    // 关联会员模型
    public function members()
    {
        return $this->belongsTo('App\\Models\\Member', 'member_id', 'id');
    }

    // 文章评论
    public function comm($data)
    {
        $rule = [
            'content' => 'required'
        ];
        $msg = [
            'content.required' => '内容不能为空'
        ];
        $validator = Validator::make($data, $rule, $msg);
        if ($validator->fails()) {
            return $validator->errors()->first();
        }
        $result = $this->create($data);
        if ($result) {
            $comm_num = (new Article())->where('id', $data['article_id'])->first();
            $comm_num->comm_num += 1;
            $comm_num->save();
            return 1;
        } else {
            return "服务器错误!";
        }
    }
}