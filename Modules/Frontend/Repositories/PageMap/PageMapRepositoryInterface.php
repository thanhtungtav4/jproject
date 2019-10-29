<?php

namespace Modules\Frontend\Repositories\PageMap;

interface PageMapRepositoryInterface
{
    /**
     * Lấy danh sách plugin theo trang
     *
     * @param array $filters
     * @return mixed
     */
    public function getPlugins(array $filters = []);

    /**
     * Lấy danh sách sản phẩm theo trang
     *
     * @param array $filters
     * @return mixed
     */
    public function getPluginsProduct(array $filters = []);
}
