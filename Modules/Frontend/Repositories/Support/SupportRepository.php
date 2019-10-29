<?php

namespace Modules\Frontend\Repositories\Support;

use Modules\Frontend\Models\SupportTable;

class SupportRepository implements SupportRepositoryInterface
{
    protected $support;

    public function __construct(
        SupportTable $support
    ) {
        $this->support = $support;
    }

    /**
     * Lấy danh sách nội dung hỗ trợ
     *
     * @return array
     */
    public function getListAll()
    {
        $result = $this->support->getListAll();

        return $result;
    }
}
