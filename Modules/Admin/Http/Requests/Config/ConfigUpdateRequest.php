<?php


namespace Modules\Admin\Http\Requests\Config;


use Illuminate\Foundation\Http\FormRequest;

class ConfigUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'value_vi' => 'max:191',
//            'value_en' => 'max:255',
        ];
    }

    /**
     * Get the message validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
//            'value_vi.max' => __('admin::validation.config.value_vi_max'),
//            'value_en.max' => __('admin::validation.config.value_en_max'),
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