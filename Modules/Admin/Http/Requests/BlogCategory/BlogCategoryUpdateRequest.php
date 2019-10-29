<?php


namespace Modules\Admin\Http\Requests\BlogCategory;


use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryUpdateRequest extends FormRequest
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
            'title_vi' => 'required|unique:tpcloud_cms_blog_category,title_vi,
                    '.$param['id'].',id,is_deleted,0|max:255',
            'title_en' => 'required|unique:tpcloud_cms_blog_category,title_en,
                    '.$param['id'].',id,is_deleted,0|max:255',
            'content_vi' => 'required',
            'content_en' => 'required',
            'alias_vi' => 'unique:tpcloud_cms_blog_category,alias_vi,
                    '.$param['id'].',id,is_deleted,0',
            'alias_en' => 'unique:tpcloud_cms_blog_category,alias_en,
                    '.$param['id'].',id,is_deleted,0'
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
            'title_vi.required' => __('admin::validation.blog_category.title_vn_required'),
            'title_vi.unique' => __('admin::validation.blog_category.title_vn_unique'),
            'title_vi.max' => __('admin::validation.blog_category.title_vn_max'),
            'title_en.required' => __('admin::validation.blog_category.title_en_required'),
            'title_en.unique' => __('admin::validation.blog_category.title_en_unique'),
            'title_en.max' => __('admin::validation.blog_category.title_en_max'),
            'content_vi.required' => __('admin::validation.blog_category.content_vn_required'),
            'content_en.required' => __('admin::validation.blog_category.content_en_required'),
            'alias_vi.unique' => __('admin::validation.blog_category.alias_vi_unique'),
            'alias_en.unique' => __('admin::validation.blog_category.alias_en_unique'),
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