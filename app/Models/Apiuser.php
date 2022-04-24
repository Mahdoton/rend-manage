<?php

namespace App\Models;

use App\Observers\Apiuserobserver;

// 继承可以使用 auth登录的模型类
use Illuminate\Foundation\Auth\User as AuthUser;
// api验证方法
use Laravel\Passport\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;

class Apiuser extends AuthUser {

    use SoftDeletes,HasApiTokens;
    // 软删除标识字段
    protected $dates = ['deleted_at'];

    // 设置添加的字段  create 添加数据有效的
    // 拒绝不添加的字段
    protected $guarded = [];

    protected static function boot() {
        parent::boot();
        self::observe(Apiuserobserver::class);
    }


}
