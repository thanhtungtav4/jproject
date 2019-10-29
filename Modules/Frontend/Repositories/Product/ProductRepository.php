<?php

namespace Modules\Frontend\Repositories\Product;

use Modules\Frontend\Models\PageMapTable;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var AdminMenuCategoryTable
     */
    protected $mDBA;

    /**
     * @var AdminMenuTable
     */

    public function __construct(PageMapTable $pageMapTable) {
        $this->mDBA = $pageMapTable;
    }

    /**
     * Lấy danh sách menu category có phân trang
     *
     * @param array $filters
     * @return mixed
     */
    public function getAllProduct(array $filters = [])
    {
        $arrData = $this->mDBA->getFunctionByPage($filters);

        $arrResult = [];

        foreach ($arrData as $item){
            $arrResult[$item['plugin_type']][] = $item;
        }
        return $arrResult;
    }
}
