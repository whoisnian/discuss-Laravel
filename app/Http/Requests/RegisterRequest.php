<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        if($this->method()=='POST')
            return [
                'name' => 'required|alpha_dash|max:64|unique:users,name',
                'email' => 'required|email|unique:users,email|max:64',
                'password' => 'required|confirmed|between:6,128',
            ];
    }

    public function messages(){
        return [
            'name.required' => '昵称不能为空！',
            'name.max' => '昵称长度不能超过64个字符！',
            'name.alpha_dash' => '昵称只能为字母、数字、减号和下划线！',
            'name.unique' => '该昵称已被注册！',
            'password.required' => '密码不能为空！',
            'password.confirmed' => '两次输入的密码不一致！',
            'password.between' => '密码长度必须为6-128个字符',
            'email.required' => '邮箱不能为空！',
            'email.max' => '邮箱长度不能超过64个字符！',
            'email.email' => '邮箱格式不正确！',
            'email.unique' => '该邮箱已被注册！',
        ];
    }
}
