<?php

namespace Modules\Frontend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'phone' => 'required|digits_between:8,20',
            'company' => 'required|max:250'
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
            'phone.required' => __('Vui lòng nhập số điện thoại'),
            'phone.digits_between' => __('Vui lòng nhập điện thoại từ 8 đến 20 chữ số'),
            'company.required' => __('Vui lòng nhập tên tổ chức/công ty'),
            'company.max' => __('Tên tổ chức/công ty chỉ nhập tối đa 250 ký tự'),
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
