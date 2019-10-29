<?php

namespace Modules\Frontend\Repositories\Product;

interface ProductRepositoryInterface
{
    /**
     * Lấy danh sách menu category có phân trang
     *
     * @param array $filters
     * @return mixed
     */
    public function getAllProduct(array $filters = []);
}
