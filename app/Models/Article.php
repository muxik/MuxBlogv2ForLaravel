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

    // 添加文章
    public function add($data)
    {
        $rule = [
            'title' => 'bail|required',
            'desc'  => 'required',
            'tags'  => 'required',
            'content' => 'required',
            'cate_id' => 'required',
            'member_id' => 'required',
        ];

        $msg = [
            'title.required' => '标题不能为空',
            'tags.required' => '标签不能为空',
            'desc.required' => '文章详情不能为空',
            'content.required' => '文章内容不能为空',
            'cate_id.required' => '栏目不能为空',
            'member_id.required' => '作者不能为空'
        ];


        $validator = Validator::make($data, $rule, $msg);
        if ($validator->fails()) {
            return $validator->errors()->first();
        }
        $result = $this->create($data);
        if ($result) {
            return 1;
        } else {
            return "服务器错误,操作失败";
        }
    }

    // 关联评论
    public function comments()
    {
        return $this->hasMany('App\\Models\Comment', 'article_id', 'id');
    }

    // 添加文章
    public function edit($data)
    {
        $rule = [
            'title' => 'bail|required',
            'desc'  => 'required',
            'tags'  => 'required',
            'content' => 'required',
            'cate_id' => 'required',
            'member_id' => 'required',
        ];

        $msg = [
            'title.required' => '标题不能为空',
            'tags.required' => '标签不能为空',
            'desc.required' => '文章详情不能为空',
            'content.required' => '文章内容不能为空',
            'cate_id.required' => '栏目不能为空',
            'member_id.required' => '作者不能为空'
        ];

        $validator = Validator::make($data, $rule, $msg);
        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        // 查询保存
        $articleInfo = $this->find($data['id']);
        $articleInfo->title = $data['title'];
        $articleInfo->desc = $data['desc'];
        $articleInfo->tags = $data['tags'];
        $articleInfo->content = $data['content'];
        $articleInfo->member_id = $data['member_id'];
        $articleInfo->cate_id = $data['cate_id'];
        $result = $articleInfo->save($data);
        if ($result) {
            return 1;
        } else {
            return "服务器错误,操作失败";
        }
    }
}