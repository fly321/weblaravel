<?php
/**
 * 用户控制器
 */
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

// 独立方式验证
use Validator;
class UserController extends Controller
{
    // 添加用户的界面
    public function index(){
        return view('user.index');
    }

    // 添加用户验证
    public function addSave(Request $request){
        // 表单的后台验证
        /*$input = $this->validate($request,[
            // 表单字段名 => 规则名 多个规则用 | 隔开
            'username'=>'required|between:2,6',
            //确认密码一定要写在原始密码上
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'email'=>'required|email',
        ],[
            'username.required'=>'用户名不能为空',
            'username.between'=>'用户名在2-6之间',
            'password.required'=>'密码不能为空',
            'password.confirmed'=>'两次密码不一致',
            'password_confirmation.required'=>'确认密码不能为空',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不合法'
        ]);*/


        /*方案2*/
        /*$validate = Validator::make($request->all(),[
            // 表单字段名 => 规则名 多个规则用 | 隔开
            'username'=>'required|between:2,6',
            //确认密码一定要写在原始密码上
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'email'=>'required|email',
        ],[
            'username.required'=>'用户名不能为空',
            'username.between'=>'用户名在2-6之间',
            'password.required'=>'密码不能为空',
            'password.confirmed'=>'两次密码不一致',
            'password_confirmation.required'=>'确认密码不能为空',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不合法'
        ]);*/
        // dump(get_class_methods($validate));
        // 如果有错就返回true
        $validate = Validator::make($request->all(),[
            // 表单字段名 => 规则名 多个规则用 | 隔开
            'username'=>'required|between:2,6',
            //确认密码一定要写在原始密码上
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'email'=>'required|email',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate);
            // echo 'abc';die;
        }
        // dump($input);
        // dump($request->except(['__token']));



        // dump($request->all());
    }
}
