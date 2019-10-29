<?php


namespace Modules\Admin\Http\Requests\Blog;


use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_vi' => 'required|unique:tpcloud_cms_blog,title_vi,
                    ' . ',id,is_deleted,0|max:255',
            'title_en' => 'required|unique:tpcloud_cms_blog,title_en,
                    ' . ',id,is_deleted,0|max:255',
            'content_vi' => 'required',
            'content_en' => 'required',
            'image_thumb' => 'required',
            'description_vi' => 'max:255',
            'description_en' => 'max:255',
            'category_id' => 'required',
            'alias_vi' => 'unique:tpcloud_cms_blog,alias_vi,
                    ' . ',id,is_deleted,0',
            'alias_en' => 'unique:tpcloud_cms_blog,alias_en,
                    ' . ',id,is_deleted,0'
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
            'title_vi.required' => __('admin::validation.blog.title_vn_required'),
            'title_vi.unique' => __('admin::validation.blog.title_vn_unique'),
            'title_vi.max' => __('admin::validation.blog.title_vn_max'),
            'title_en.required' => __('admin::validation.blog.title_en_required'),
            'title_en.unique' => __('admin::validation.blog.title_en_unique'),
            'title_en.max' => __('admin::validation.blog.title_en_max'),
            'content_vi.required' => __('admin::validation.blog.content_vn_required'),
            'content_en.required' => __('admin::validation.blog.content_en_required'),
            'image_thumb.required' => __('admin::validation.blog.image_required'),
            'description_vi.max' => __('admin::validation.blog.description_vn_max'),
            'description_en.max' => __('admin::validation.blog.description_en_max'),
            'category_id.required' => __('admin::validation.blog.category_required'),
            'alias_vi.unique' => __('admin::validation.blog.alias_vi_unique'),
            'alias_en.unique' => __('admin::validation.blog.alias_en_unique'),
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