<?php

namespace Modules\Frontend\Models;

class SupportTable extends BaseModel
{
    protected $table = 'tpcloud_cms_support';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'title_vi',
        'title_en',
        'alias_vi',
        'alias_en',
        'description_vi',
        'description_en',
        'image_thumb',
        'content_vi',
        'content_en',
    ];

    /**
     * Lấy danh sách nội dung hỗ trợ
     *
     * @return array
     */
    public function getListAll()
    {
        $result = $this->where('is_active', 1)
            ->where('is_deleted', 0)
            ->select($this->fillable)
            ->orderBy('published_date', 'desc');

        return $this->makeResult($result);
    }
}
