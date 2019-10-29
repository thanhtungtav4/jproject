<?php


namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class SupportTable extends Model
{
    use ListTableTrait;
    protected $table = 'tpcloud_cms_support';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'title_vi',
        'title_en',
        'alias_vi',
        'alias_en',
        'description_vi',
        'description_en',
        'image_thumb',
        'content_vi',
        'content_en',
        'is_active',
        'is_deleted',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
        'published_date',
        'published_by'
    ];

    /**
     * List support
     *
     * @param array $filter
     * @return mixed
     */
    public function getListCore(&$filter = [])
    {
        $ds = $this->select(
            'title_vi',
            'title_en',
            'description_vi',
            'description_en',
            'image_thumb',
            'is_active',
            'id'
        )
            ->where('is_deleted', 0)
            ->orderBy('created_at', 'desc');
        if (isset($filter['keyword_search'])) {
            $search = $filter['keyword_search'];
            $ds->where(function ($query) use ($search) {
                $query->where('title_vi', 'like', '%' . $search . '%')
                    ->orWhere('title_en', 'like', '%' . $search . '%')
                    ->orWhere('description_vi', 'like', '%' . $search . '%')
                    ->orWhere('description_en', 'like', '%' . $search . '%');
            });
            unset($filter['keyword_search']);
        }
        unset($filter['is_active']);
        return $ds;
    }

    /**
     * Create support
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
     * Get support by id
     *
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
     * Update support
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
     * Remove support
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