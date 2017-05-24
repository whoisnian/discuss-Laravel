<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
                'title' => 'required',
                'content' => 'required',
                'anonymous' => 'required',
            ];
    }

    public function messages(){
        return [
            'title.required' => '标题不能为空！',
            'content.required' => '内容不能为空！',
            'anonymous.required' => '请选择是否匿名！',
        ];
    }
}
