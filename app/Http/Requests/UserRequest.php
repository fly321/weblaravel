<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 表单字段名 => 规则名 多个规则用 | 隔开
            'username'=>'required|between:2,6',
            //确认密码一定要写在原始密码上
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'email'=>'required|email',
        ];
    }

    /**
     * @return array|string[] 错误提示
     */
    public function messages()
    {
        return [
            'username.required'=>'用户名不能为空',
            'username.between'=>'用户名在2-6之间',
            'password.required'=>'密码不能为空',
            'password.confirmed'=>'两次密码不一致',
            'password_confirmation.required'=>'确认密码不能为空',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不合法'
        ];
    }
}
