<?php

namespace Modules\Frontend\Repositories\Page;

use Modules\Frontend\Models\PageTable;

class PageRepository implements PageRepositoryInterface
{
    /**
     * @var PageTable
     */
    protected $mDBA;

    public function __construct(PageTable $pageTable)
    {
        $this->mDBA = $pageTable;
    }

    /**
     * Lấy danh sách menu category có phân trang
     *
     * @param array $filters
     * @return mixed
     */
    public function getAllPageProduct(array $filters = [])
    {
        return $this->mDBA->getAllPageProduct($filters);
    }

    public function getCurrentPage(array $filters = [])
    {
        return collect($this->mDBA->getCurrentPage($filters['page_id']))->first();
    }

    public function getCurrentPageByType(array $filters = [])
    {
        return collect($this->mDBA->getCurrentPageByType($filters['page_type']));
    }


    /**
     * Lấy thông tin trang hiện tại theo alias
     *
     * @param array $filters
     * @return mixed
     */
    public function getCurrentPageByAlias(array $filters)
    {
        return collect($this->mDBA->getCurrentPage($filters))->first();
    }

    public function getSolutionList($filter)
    {
        return $this->mDBA->getListSolution($filter);
    }
}