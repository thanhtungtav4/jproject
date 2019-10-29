<?php

namespace Modules\Frontend\Repositories\Page;

interface PageRepositoryInterface
{
    /**
     * Lấy danh sách menu category có phân trang
     *
     * @param array $filters
     * @return mixed
     */
    public function getAllPageProduct(array $filters = []);

    public function getCurrentPage(array $filters = []);

    /**
     * Lấy thông tin trang hiện tại theo alias
     *
     * @param array $filters
     * @return mixed
     */
    public function getCurrentPageByAlias(array $filters);
}
