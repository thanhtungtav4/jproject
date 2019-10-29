<?php


namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class BlogCategoryTable extends Model
{
    use ListTableTrait;
    protected $table = 'tpcloud_cms_blog_category';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'title_vi',
        'title_en',
        'alias_vi',
        'alias_en',
        'image_thumb',
        'content_vi',
        'content_en',
        'is_active',
        'is_deleted',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    /**
     * Danh sách blog category
     *
     * @param array $filter
     * @return mixed
     */
    public function getListCore(&$filter = [])
    {
        $ds = $this->select(
            'title_vi',
            'title_en',
            'is_active',
            'image_thumb',
            'id'
        )->where('is_deleted', 0)->orderBy('created_at', 'desc');
        unset($filter['is_active']);
        return $ds;
    }

    /**
     * Tạo mới blog category
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
     * Get blog category by id
     *
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
     * Cập nhật blog category
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
     * Remove blog category
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

    /**
     * Get option blog category
     *
     * @return mixed
     */
    public function getBlogCategoryOption()
    {
        $ds = $this->select(
            'id',
            'title_vi',
            'title_en'
        )
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->get();
        return $ds;
    }
}
