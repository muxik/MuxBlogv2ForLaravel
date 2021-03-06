<?php

/*
|---------------------------------------------------------------------------
| Web Routes                                                               |
|---------------------------------------------------------------------------
*/

/**
 * 前台路由
 */
Route::namespace('Index')->group(function () {
    Route::get('/', 'Index@index');
    Route::get('index/{id?}', 'Index@index');
    Route::get('info/{id?}', 'Index@info');
    Route::post('login_out', 'Index@login_out');
    Route::post('comm', 'Index@comm');
    Route::get('search', 'Index@search');
    Route::match(['get', 'post'], 'register', 'Index@register');
    Route::match(['get', 'post'], 'login', 'Index@login');
    Route::match(['get', 'post'], 'contribute', 'Index@contribute');
});

/**
 * 后台路由
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //  ----- 登录注册忘记密码 -----
    Route::match(['get', 'post'], '/', 'Index@login');
    Route::match(['get', 'post'], 'register', 'Index@register');
    Route::match(['get', 'post'], 'forget', 'Index@forget');

    //  ----- 后台首页 -----
    Route::group(['middleware' => 'admin.login'], function () {
        Route::get('index', 'Home@index');
        Route::post('login_out', 'Home@login_out');

        // == 管理员操作 ==
        Route::get('admin-list', 'Admin@info');
        Route::post('admin-status', 'Admin@status');
        Route::match(['get', 'post'], 'admin-add', 'Admin@add');
        Route::match(['get', 'post'], 'admin-edit/{id?}', 'Admin@edit');
        Route::post('admin-delete', 'Admin@delete');

        // == 会员操作 ==
        Route::get('member-list', 'Member@info');
        Route::match(['get', 'post'], 'member-add', 'Member@add');
        Route::match(['get', 'post'], 'member-edit/{id?}', 'Member@edit');
        Route::post('member-delete', 'Member@delete');

        // == 栏目操作 ==
        Route::get('cate-list', 'Cate@info');
        Route::post('cate-sort', 'Cate@sort');
        Route::post('cate-delete', 'Cate@delete');
        Route::match(['get', 'post'], 'cate-add', 'Cate@add');
        Route::match(['get', 'post'], 'cate-edit/{id?}', 'Cate@edit');

        // == 文章操作 == 
        Route::get('article-list', 'Article@info');
        Route::post('article-is_top', 'Article@is_top');
        Route::post('article-status', 'Article@status');
        Route::post('article-delete', 'Article@delete');
        Route::match(['get', 'post'], 'article-add', 'Article@add');
        Route::match(['get', 'post'], 'article-edit/{id?}', 'Article@edit');

        // == 评论操作 ==
        Route::get('comment-list', 'Comment@info');
        Route::post('comment-delete', 'Comment@delete');

        // == 系统设置 == 
        Route::match(['get', 'post'], 'system', 'System@info');
    });
});