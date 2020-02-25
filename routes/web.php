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
    Route::get('index', 'Home@index');
});