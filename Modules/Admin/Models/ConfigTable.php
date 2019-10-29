<?php


namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class ConfigTable extends Model
{
    use ListTableTrait;
    protected $table = 'tpcloud_cms_config';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'key',
        'name',
        'description',
        'value_vi',
        'value_en',
        'type',
        'active',
        'is_deleted',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by'
    ];

    /**
     * List config
     *
     * @param array $filter
     * @return mixed
     */
    public function getListCore(&$filter = [])
    {
        $ds = $this->select(
            'id',
            'key',
            'name',
            'description',
            'value_vi',
            'value_en',
            'type'
        );
        return $ds;
    }

    /**
     * Get config by id
     *
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
     * Update config
     *
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        return $this->where('id', $id)->update($data);
    }

}