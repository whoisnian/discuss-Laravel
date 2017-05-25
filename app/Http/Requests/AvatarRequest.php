<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvatarRequest extends FormRequest
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
                'avatar' => 'required|mimetypes:image/png,image/jpeg,image/jpg|max:2048',
            ];
    }

    public function messages(){
        return [
            'avatar.required' => '请选择一张图片！',
            'avatar.mimetypes' => '文件格式错误！',
            'avatar.max' => '图片过大',
        ];
    }
}
