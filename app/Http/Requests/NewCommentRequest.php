<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCommentRequest extends FormRequest
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
            'subject' => 'required|max:255|min:5',
            'product_id' => 'required',
            'step_1' => 'required',
            'step_2' => 'required',
            'step_3' => 'required',
            'step_4' => 'required',
            'vote' => 'required',
        ];
    }

    public function messages()
    {
        return [
           'text.required' => 'لطفا متن را وارد کنید .',
           'text.min' => 'کمتر از ده کلمه مجاز نمی باشد .',
           'text.max' => 'بیشتر از 1024 کلمه مجاز نمی باشد',
           'subject.required' => 'لطفا موضوع را وارد کنید .',
           'subject.min' => 'کمتر از پنچ کلمه مجاز نمی باشد .',
           'subject.max' => 'بیشتر از 255 کلمه مجاز نمی باشد',
           'step_1.required' => 'لطفا به این محصول رای بدهید.',
           'step_2.required' => 'لطفا به این محصول رای بدهید.',
           'step_3.required' => 'لطفا به این محصول رای بدهید.',
           'step_4.required' => 'لطفا به این محصول رای بدهید.',
           'vote.required' => 'لطفا به این محصول رای بدهید.',
        ];
    }
}
