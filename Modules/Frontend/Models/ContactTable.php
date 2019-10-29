<?php

namespace Modules\Frontend\Models;

class ContactTable extends BaseModel
{
    protected $table = 'tpcloud_cms_contact';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'fullname',
        'subject',
        'email',
        'note',
        'created_at',
        'updated_at'
    ];

    /**
     * Thêm liên hệ
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        return $this->create($data);
    }
}
