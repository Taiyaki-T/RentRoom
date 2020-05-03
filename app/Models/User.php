<?php

namespace App\Models;

//继承可以使用 auth登陆的模型类
use Illuminate\Foundation\Auth\User as AuthUser;


class User extends AuthUser
{
    // 设置添加的字段  create 添加数据有效的
    // 拒绝不添加的字段
    protected $guarded = [];


    //隐藏字段
    protected $hidden = ['password'];
}
