<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
    });
});