<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use function foo\func;

class MycacheController extends Controller
{
    public function index()
    {
        # 添加只有不存在 或者过期时才能添加成功
        dump(Cache::add('name','张三',10));
        # 没有返回值，没有则添加，you则修改
        dump(Cache::put('age',18,10));

        # 判断一个key 是否存在 ,存在就返回true 否则就返回false
        dump(cache()->has('age'));
        dump(cache()->has('id'));

        # 获取
        # $ret = cache('name');
        # $ret = Cache::get('age');

        # 获取如果不存在则可以用默认值
        #$ret=Cache::get('id',1);

        # 默认值还可以是回调的匿名函数
        /*$ret = Cache::get('id',function(){
            return 222;
        });*/
        /*$ret = cache('id',function (){
            return 333;
        });*/

        # 先判断对应的key有没有
        # 没有则执行匿名函数中的方法，然后再把数据库写到缓存中，后再返回给用户
        # 有，直接读缓存，给用户
        // $ret = Cache::remember('user',10,function(){
        //     $ret = \DB::table('users')->where('id',1)->first();
        //     return $ret;
        // });
        // dump(cache()->has('user'));
        // dump($ret);
        // return 'index';

        # 删除单个
        echo 1;
        dump(Cache::forget('name'));
        dump(cache()->has('namer'));

        # 永久缓存
        // Cache::forever('id',1000);
        dump(Cache::forget('id'));
        dump(cache('id'));
    }
}
