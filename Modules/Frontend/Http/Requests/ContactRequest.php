<?php

namespace Modules\Frontend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|max:150',
            'email' => 'required|email|max:250',
            'subject' => 'required|max:250'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => __('Vui lòng nhập họ tên'),
            'fullname.max' => __('Họ tên chỉ nhập tối đa 150 ký tự'),
            'email.required' => __('Vui lòng nhập email'),
            'email.email' => __('Vui lòng nhập đúng email'),
            'email.max' => __('Email chỉ nhập tối đa 250 ký tự'),
            'subject.required' => __('Vui lòng nhập tiêu đề'),
            'subject.max' => __('Subject chỉ nhập tối đa 250 ký tự'),
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
