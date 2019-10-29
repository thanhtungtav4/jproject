<?php

namespace Modules\Frontend\Repositories\Agency;

interface AgencyRepositoryInterface
{
    /**
     * Lấy danh sách đối tác
     *
     * @return array
     */
    public function getListAll();
}
