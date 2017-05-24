<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
                'oldpassword' => 'required',
                'password' => 'required|confirmed|between:6,128',
            ];
    }

    public function messages(){
        return [
            'oldpassword.required' => '原密码不能为空！',
            'password.required' => '新密码不能为空！',
            'password.confirmed' => '两次输入的新密码不一致！',
            'password.between' => '新密码长度必须为6-128个字符',
        ];
    }
}
