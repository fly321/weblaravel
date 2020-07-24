<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入Auth用户登录验证门面
use Auth;

class LoginController extends Controller
{
    # 登录界面展示
    public function index()
    {
        return view('admin.login.index');
    }

    # 登录数据处理    验证器
    public function login(LoginRequest $request)
    {
        /*if((new User())->login($request->all())){
            dd(session('admin.user'));
        }else{
            return redirect()->back()->with('error','登录失败,请重新登录');
        }*/
        #登录成功返回true,否则返回false
        # 如果guard不写则表示默认 web
        $user = Auth::attempt($request->only(['username','password']));
        # 辅助函数
        #$user = auth('admin')->attempt($request->only(['username','password']));
        #dump($user);

        # 短语运算符，前面为真，则执行后面的
        #$user && dump(Auth::user()->id);
        #dump(auth()->user()->userinfo()->first());
        # 以属性的方式去 调用
        dump(auth()->user()->userinfo);

    }
}
