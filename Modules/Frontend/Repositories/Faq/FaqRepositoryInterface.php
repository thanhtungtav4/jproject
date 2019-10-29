<?php

namespace Modules\Frontend\Repositories\Faq;

interface FaqRepositoryInterface
{
    /**
     * Lấy danh sách faq
     *
     * @param array $filter
     * @return array
     */
    public function getListAll(array $filter = []);
}
