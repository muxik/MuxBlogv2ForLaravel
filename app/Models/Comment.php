<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}