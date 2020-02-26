<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Article extends Model
{
    // 软删除
    use SoftDeletes;

    // 改为可写字段
    protected $fillable = ['title', 'desc', 'content', 'tags', 'member_id', 'cate_id', 'is_top', 'status'];

    // 时间戳
    protected $dateFormat = "U";

    // 时间戳转换
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // 关联会员
    public function members()
    {
        return $this->belongsTo('App\\Models\\Member', 'member_id', 'id');
    }

    // 关联导航
    public function cates()
    {
        return $this->belongsTo('App\\Models\\Cate', 'cate_id', 'id');
    }
}