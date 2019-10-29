<?php


namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class BlogTable extends Model
{
    use ListTableTrait;
    protected $table = 'tpcloud_cms_blog';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'category_id',
        'title_vi',
        'title_en',
        'alias_vi',
        'alias_en',
        'description_vi',
        'description_en',
        'image_thumb',
        'content_vi',
        'content_en',
        'news_status',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
        'published_date',
        'published_by'
    ];

    /**
     * List blog
     *
     * @param array $filter
     * @return mixed
     */
    public function getListCore($filter = [])
    {
        $ds = $this
            ->join('tpcloud_cms_blog_category', function ($join) {
                $join->on('tpcloud_cms_blog_category.id', '=', 'tpcloud_cms_blog.category_id')
                    ->where('tpcloud_cms_blog_category.is_active', 1)
                    ->where('tpcloud_cms_blog_category.is_deleted', 0);
            })->select(
                'tpcloud_cms_blog.id',
                'tpcloud_cms_blog.title_vi',
                'tpcloud_cms_blog.title_en',
                'tpcloud_cms_blog.image_thumb',
                'tpcloud_cms_blog.news_status',
                'tpcloud_cms_blog.description_vi',
                'tpcloud_cms_blog.description_en',
                'tpcloud_cms_blog_category.title_vi as title_category'
            )
            ->where('tpcloud_cms_blog.is_deleted', 0)
            ->orderBy('tpcloud_cms_blog.created_at', 'desc');
        return $ds;
    }

    /**
     * Create blog
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
     * Get Blog by id
     *
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
     * Update blog
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
     * Remove blog
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
