<?php

namespace Modules\Frontend\Repositories\ProductPrice;

use Modules\Frontend\Models\ProductPriceTable;

class ProductPriceRepository implements ProductPriceRepositoryInterface
{
    protected $productPrice;

    public function __construct(ProductPriceTable $productPrice)
    {
        $this->productPrice = $productPrice;
    }

    /**
     * Lấy danh sách bảng giá theo trang
     *
     * @param int $pageId
     * @return mixed
     */
    public function getListAllByPage($pageId)
    {
        $result = $this->productPrice->getListAllByPage($pageId);

        return $result->toArray();
    }
}
