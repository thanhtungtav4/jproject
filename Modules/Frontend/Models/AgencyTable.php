<?php

namespace Modules\Frontend\Models;

class AgencyTable extends BaseModel
{
    protected $table = 'tpcloud_cms_agency';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name_vi',
        'name_en',
        'image_logo',
        'is_active',
        'is_deleted',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    /**
     * Lấy danh sách đối tác
     *
     * @return array
     */
    public function getListAll()
    {
        $result = $this->select($this->fillable)
            ->where('is_deleted', 0)
            ->where('is_active', 1);

        return $this->makeResult($result);
    }
}
