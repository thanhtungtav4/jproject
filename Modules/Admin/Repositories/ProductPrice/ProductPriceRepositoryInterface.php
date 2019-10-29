<?php


namespace Modules\Admin\Repositories\ProductPrice;

interface ProductPriceRepositoryInterface
{
    public function createProductPrice(array $filter = []);
    public function changeProductPrice(array $filter = []);
    public function updateProductPrice(array $filter = []);
    public function getProductPriceDetail($id);
    public function getListProductPrice(array $filter = []);
}
