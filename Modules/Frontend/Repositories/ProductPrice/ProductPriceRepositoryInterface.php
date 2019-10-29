<?php

namespace Modules\Frontend\Repositories\ProductPrice;

interface ProductPriceRepositoryInterface
{
    /**
     * Lấy danh sách bảng giá theo trang
     *
     * @param int $pageId
     * @return mixed
     */
    public function getListAllByPage($pageId);
}
