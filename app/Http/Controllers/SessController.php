<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class SessController
 * @package App\Http\Controllers
 */
class SessController extends Controller
{
    public function __construct()
    {
        // 黑名单 写了就不给他进行中间件过滤
        // return $this->middleware(['checkuser'])->except(['index']);
        return $this->middleware(['checkuser']);
    }

    public function index()
    {
        # 设置session
        #session(['name'=>'张三']);

        # 获取
        // dump(session('name'));

        #判断一个值是否存在
        #dump(session()->has('age'));
        // dump(session()->has('name'));
        // // 请输session
        // session()->flush();
        // dump(session()->has('name'));

        # 设置闪存
        // session(['name'=>'张三']);
        // session()->flash('age',20);
        dump(session('name'));
        // dump(session('age'));
    }

}
