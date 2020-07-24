<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hash;

# 使用User模型来继承
use Illuminate\Foundation\Auth\User as Authorization;
class User extends Authorization
{
    protected $guarded = [];

    /**
     * 用户登录
     * @param array $data
     * @return bool
     */
    public function login(array $data){
        // 根据用户名查找用户是否存在
        $info = self::where('username',$data['username'])->first();

        # 此用户不存在
        if(!$info){
            return false;
        }

        # 密码不正确
        if(!Hash::check($data['password'],$info['password'])){
            return false;
        }

        # 写入session
        session(['admin.user'=>$info]);
        return true;

    }

    // 用户基础表和扩展表 一对一关系 hasone
    public function userinfo()
    {
        #          关联关系    关联模型  外键id 主键id
        // return $this->hasOne(UsersInfo::class,'users_id','id');
        // 简写的原则就是             外键就是 表名_id 主键 就是 id 此时就可以简写
        return $this->hasOne(UsersInfo::class);
    }

    //  一个用户对应文章 一对多关系 hasmany
    public function articles()
    {
        return $this->hasMany(Articles::class,'user_id','id');
    }

    // 多对多关系 belongsToMany
    public function auths()
    {                                  # 关联模型           中间表表名—没有前缀      本模型 对应中间表中的字段 关联模型对应中间表的字段
        return $this->belongsToMany(Auth::class,'user_auth','user_id','auth_id');
    }
}
