<?php

namespace Modules\Frontend\Models;

class FaqTable extends BaseModel
{
    protected $table = 'tpcloud_cms_faq';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'question_vi',
        'question_en',
        'answer_vi',
        'answer_en',
        'faq_order',
        'is_active',
        'is_deleted',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    /**
     * Lấy danh sách faq
     *
     * @param array $filter
     * @return array
     */
    public function getListAll(array $filter = [])
    {
        $result = $this->where('is_active', 1)
            ->where('is_deleted', 0)
            ->select($this->fillable)
            ->orderBy('faq_order', 'asc');

        if (count($filter) > 0) {
            $result->where($filter);
        }

        return $this->makeResult($result);
    }
}
