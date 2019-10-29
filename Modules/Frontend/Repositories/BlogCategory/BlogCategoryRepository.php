<?php

namespace Modules\Frontend\Repositories\BlogCategory;

use Modules\Frontend\Models\BlogCategoryTable;

class BlogCategoryRepository implements BlogCategoryRepositoryInterface
{
    protected $blogCategory;

    public function __construct(BlogCategoryTable $blogCategory)
    {
        $this->blogCategory = $blogCategory;
    }

    /**
     * Lấy danh sách loại tin tức
     *
     * @param array $filter
     * @return mixed
     */
    public function getListAll(array $filter = [])
    {
        $result = $this->blogCategory->getListAll($filter);

        return $result;
    }
}
