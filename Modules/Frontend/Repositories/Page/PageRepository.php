<?php

namespace Modules\Frontend\Repositories\Page;

use Modules\Frontend\Models\PageTable;
use Modules\Frontend\Models\PluginTable;

class PageRepository implements PageRepositoryInterface
{
    /**
     * @var PageTable
     */
    protected $mDBA;
    protected $plugin;

    public function __construct(PageTable $pageTable, PluginTable $plugin)
    {
        $this->mDBA = $pageTable;
        $this->plugin = $plugin;
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

    public function getPluginType($filter)
    {
        return $this->plugin->getSolutionList($filter);
    }
}
