<?php

namespace Modules\Frontend\Models;

class ConfigTable extends BaseModel
{
    protected $table = 'tpcloud_cms_config';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'key',
        'name',
        'value_vi',
        'value_en',
    ];

    /**
     * Lấy toàn bộ danh sách config
     *
     * @return mixed
     */
    public function getListAll()
    {
        return $this->select($this->fillable)->get();
    }
}
