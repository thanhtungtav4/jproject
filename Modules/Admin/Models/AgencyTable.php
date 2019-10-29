<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class AgencyTable extends Model
{
    use ListTableTrait;
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
        'updated_at',
        'created_by',
        'updated_by',
    ];

    /**
     * List agency
     *
     * @param array $filter
     * @return mixed
     */
    public function getListCore(&$filter = [])
    {
        $ds = $this->select(
            'id',
            'name_vi',
            'name_en',
            'image_logo',
            'is_active',
            'is_deleted',
            'created_at'
        )->where('is_deleted', 0)->orderBy('created_at', 'desc');
        if (isset($filter['keyword_search'])) {
            $search = $filter['keyword_search'];
            $ds->where(function ($query) use ($search) {
                $query->where('name_vi', 'like', '%' . $search . '%')
                    ->orWhere('name_en', 'like', '%' . $search . '%');
            });
            unset($filter['keyword_search']);
        }
        unset($filter['is_active']);
        return $ds;
    }

    /**
     * Create agency
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $add = $this->create($data);
        return $add->id;
    }

    /**
     * Get agency by id
     *
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
     * Update agency
     *
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        return $this->where('id', $id)->update($data);
    }

    /**
     * Remove agency
     *
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->where('id', $id)->update([
            'is_deleted' => 1
        ]);
    }
}