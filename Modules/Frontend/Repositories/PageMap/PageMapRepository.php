<?php

namespace Modules\Frontend\Repositories\PageMap;

use Modules\Frontend\Models\PageMapTable;

class PageMapRepository implements PageMapRepositoryInterface
{
    /**
     * @var PageMapTable
     */
    protected $mDBA;

    public function __construct(PageMapTable $pageMapTable)
    {
        $this->mDBA = $pageMapTable;
    }

    /**
     * Lấy danh sách plugin theo trang
     *
     * @param array $filters
     * @return mixed
     */
    public function getPlugins(array $filters = [])
    {
        $arrData = $this->mDBA->getFunctionByPage($filters);

        $arrResult = [];

        foreach ($arrData as $item) {
            $arrResult[$item['plugin_type']][] = $item;
        }
        return $arrResult;
    }

    /**
     * Lấy danh sách sản phẩm theo trang
     *
     * @param array $filters
     * @return mixed
     */
    public function getPluginsProduct(array $filters = [])
    {
        $arrResult = $this->mDBA->getFunctionProductByPage($filters);

        return $arrResult;
    }
}
