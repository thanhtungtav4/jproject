<?php

namespace Modules\Core\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email,' . ',id,is_deleted,0',
            'password' => ['required', 'min:8'],
        ];
    }

    /*
     * function custom messages
     */
    public function messages()
    {
        return [
            'full_name.required' => __('core::validation.user.PLEASE_ENTER_NAME'),
            'email.required' => __('core::validation.user.PLEASE_ENTER_EMAIL'),
            'email.email' => __('core::validation.user.PLEASE_ENTER_EMAIL'),
            'email.unique' => __('core::validation.user.EMAIL_EXIST'),
            'password.required' => __('core::validation.user.PLEASE_ENTER_PASSWORD'),
            'password.min' => __('core::validation.user.PASSWORD_LENGTH'),
        ];
    }
}
