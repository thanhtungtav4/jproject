<?php


namespace Modules\Admin\Http\Requests\Agency;


use Illuminate\Foundation\Http\FormRequest;

class AgencyUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $param = request()->all();
        return [
            'name_vi' => 'required|unique:tpcloud_cms_agency,name_vi,
                    '.$param['id'].',id,is_deleted,0|max:255',
            'name_en' => 'required|unique:tpcloud_cms_agency,name_en,
                    '.$param['id'].',id,is_deleted,0|max:255',
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
            'name_vi.required' => __('admin::validation.blog_category.title_vn_required'),
            'name_vi.unique' => __('admin::validation.blog_category.title_vn_unique'),
            'name_vi.max' => __('admin::validation.blog_category.title_vn_max'),
            'name_en.required' => __('admin::validation.blog_category.title_en_required'),
            'name_en.unique' => __('admin::validation.blog_category.title_en_unique'),
            'name_en.max' => __('admin::validation.blog_category.title_en_max'),
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