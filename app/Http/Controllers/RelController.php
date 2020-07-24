<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class RelController extends Controller
{
    // 一对一
    public function one(Request $request)
    {
        //n+1
        #$user = User::find(1);
        #dump($user->userinfo);

        #预加载
        /*$user = User::with('userinfo')->where('id',1)->first();
        #调用扩展名中的信息
        dump($user->userinfo->body);
        dump($user);*/

        #$user = User::find(1);
        #$arts = $user->articles->toArray();
        // 写条件
        #$arts = $user->articles()->where('id','>',1)->get()->toArray();

        /*$arts = User::with(['articles'=>function($query){
            $query->where('id','>=',1);
        }])->where('id',1)->first();
        #dump($arts);

        // 取文章列表
        dump($arts->articles);*/

        //查询他的权限
        $user = User::find(1);;
        #$auths = $user->auths->toArray();

        // 获取当前路由别名
        #dump($request->route()->getName());

        // 得到二维数组中的指定的字段 php5.4以后有的
        #dump(array_column($auths,'name'));

        # 修改权限
        $user->auths()->sync([1,2]);

    }
}
