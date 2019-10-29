<?php

namespace Modules\Frontend\Models;

use MyCore\Models\Traits\ListTableTrait;

class BlogTable extends BaseModel
{
    use ListTableTrait;
    protected $table = 'tpcloud_cms_blog';
    protected $primaryKey = 'id';

    protected function getListCore(array $filter = [])
    {
        $result = $this->join('tpcloud_cms_blog_category as blog_cat', function ($join) {
            $join->on('blog_cat.id', '=', $this->table.'.category_id')
                ->where('blog_cat.is_deleted', 0);
        })
            ->leftJoin('admin', 'admin.id', '=', $this->table.'.published_by')
            ->where('tpcloud_cms_blog.is_deleted', 0)
            ->select(
                $this->table.'.id',
                $this->table.'.title_vi',
                $this->table.'.title_en',
                $this->table.'.category_id',
                $this->table.'.image_thumb',
                $this->table.'.alias_vi',
                $this->table.'.alias_en',
                $this->table.'.content_vi',
                $this->table.'.content_en',
                $this->table.'.description_vi',
                $this->table.'.description_en',
                $this->table.'.news_status',
                $this->table.'.created_at',
                $this->table.'.published_date',
                $this->table.'.published_by',
                'admin.full_name as created_by_name',
                'blog_cat.title_vi as blog_category_name_vi',
                'blog_cat.title_en as blog_category_name_en',
                'blog_cat.alias_vi as blog_category_alias_vi',
                'blog_cat.alias_en as blog_category_alias_en'
            );

        return $result;
    }

    /**
     * Lấy chi tiết tin tức
     *
     * @param array|int $condition
     * @return mixed
     */
    public function getDetail($condition)
    {
        $result = $this->getListCore();

        if (is_array($condition)) {
            $result->where($condition);
        } else {
            $result->where($this->table.'.'.$this->primaryKey, $condition);
        }

        return $result->first();
    }

    /**
     * Lấy bài viết liên quan
     *
     * @param array $condition
     * @param int $id
     * @param int $limit
     * @return mixed
     */
    public function getReferent(array $condition, $id, $limit = 3)
    {
        $result = $this->getListCore()
            ->where($this->table.'.'.$this->primaryKey, '<>', $id)
            ->take($limit);

        if (count($condition) > 0) {
            $result->where($condition);
        }

        return $result->get();
    }
}
