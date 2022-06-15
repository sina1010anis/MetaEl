<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyCommentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'text' => 'required|max:1024|min:10',
            'comment_product_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'لطفا متن را وارد کنید .',
            'text.min' => 'کمتر از ده کلمه مجاز نمی باشد .',
            'text.max' => 'بیشتر از 1024 کلمه مجاز نمی باشد',
        ];
    }
}
