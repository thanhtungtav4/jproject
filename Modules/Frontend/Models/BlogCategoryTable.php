<?php

namespace Modules\Frontend\Models;

class BlogCategoryTable extends BaseModel
{
    protected $table = 'tpcloud_cms_blog_category';
    protected $primaryKey = 'id';

    /**
     * Lấy danh sách loại tin tức
     *
     * @param array $filter
     * @return mixed
     */
    public function getListAll(array $filter = [])
    {
        $result = $this->where('is_active', 1)
            ->where('is_deleted', 0)
            ->select(
                'id',
                'title_vi',
                'title_en',
                'alias_vi',
                'alias_en',
                'image_thumb',
                'content_vi',
                'content_en'
            )
            ->get();

        return $result;
    }
}
