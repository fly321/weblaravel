<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HtmlController extends Controller
{
    public function index(){
        /*// 一定要写模板的名称 /resources/views/index.blade.php
        // return view('index');
        // 视图分模块
        #return view('html/index');
        // return view('index.html.index');*/

        $data = ['id'=>1,'name'=>'张三','age'=>22];
        $title='原始输出';
        $age = 22;
        $list = [
            ['id'=>1,'title'=>'php基础1'],
            ['id'=>2,'title'=>'php基础2'],
            ['id'=>3,'title'=>'php基础3']
        ];
        $lda = [];
        # 关联数组形式来传值
        #return view('index',$data);
        #return view('index',['data'=>$data]);

        # 推荐
        # compact 来解决 // 还是一个数组 和他效果是一样的 return view('index',['data'=>$data]);
        return view('index',compact('data','title','list','lda'));

        # with传值
        #return view('index')->with(['data'=>$data]);
    }
    public function inc(){
        return view('inc');
    }
    public function inc2(){
        return view('inc2');
    }
    public function html1(){
        return view('html1');
    }
    public function html2(){
        return view('html2');
    }
}
