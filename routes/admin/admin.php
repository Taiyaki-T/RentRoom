<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/4/27
 * Time: 22:16
 */

//后台路由

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

    // 登陆显示 name 给路由起一个别名
    Route::get('login', 'LoginController@index')->name('admin.login');
    // 登陆处理
    Route::post('login','LoginController@login')->name('admin.login');

    // 后台首页显示
    Route::get('index','IndexController@index')->name('admin.index');

    // 欢迎页面显示
    Route::get('welcome','IndexController@welcome')->name('admin.welcome');

    // 退出
    Route::get('logout','IndexController@logout')->name('admin.logout');


    Route::get('test2','IndexController@test2')->name('admin.test2');

});