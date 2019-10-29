<?php

namespace Modules\Frontend\Repositories\Agency;

use Modules\Frontend\Models\AgencyTable;

class AgencyRepository implements AgencyRepositoryInterface
{
    protected $agency;

    public function __construct(
        AgencyTable $agency
    ) {
        $this->agency = $agency;
    }

    /**
     * Lấy danh sách đối tác
     *
     * @return array
     */
    public function getListAll()
    {
        return $this->agency->getListAll();
    }
}
