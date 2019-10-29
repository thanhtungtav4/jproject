<?php


namespace Modules\Admin\Http\Requests\Faq;


use Illuminate\Foundation\Http\FormRequest;

class FaqStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question_vi' => 'required|unique:tpcloud_cms_faq,question_vi,
                    ' . ',id,is_deleted,0',
            'question_en' => 'required|unique:tpcloud_cms_faq,question_en,
                    ' . ',id,is_deleted,0',
            'answer_vi' => 'required|unique:tpcloud_cms_faq,answer_vi,
                    ' . ',id,is_deleted,0',
            'answer_en' => 'required|unique:tpcloud_cms_faq,answer_en,
                    ' . ',id,is_deleted,0',
            'faq_order' => 'required|unique:tpcloud_cms_faq,faq_order,
                    ' . ',id,is_deleted,0|numeric|digits_between:1,4'
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
            'question_vi.required' => __('admin::validation.faq.question_vi_required'),
            'question_vi.unique' => __('admin::validation.faq.question_vi_unique'),
            'question_en.required' => __('admin::validation.faq.question_en_required'),
            'question_en.unique' => __('admin::validation.faq.question_en_unique'),
            'answer_vi.required' => __('admin::validation.faq.answer_vi_required'),
            'answer_vi.unique' => __('admin::validation.faq.answer_vi_unique'),
            'answer_en.required' => __('admin::validation.faq.answer_en_required'),
            'answer_en.unique' => __('admin::validation.faq.answer_en_unique'),
            'faq_order.required' => __('admin::validation.faq.faq_order_required'),
            'faq_order.unique' => __('admin::validation.faq.faq_order_unique'),
            'faq_order.numeric' => __('admin::validation.faq.faq_order_number'),
            'faq_order.digits_between' => __('admin::validation.faq.faq_order_max'),
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