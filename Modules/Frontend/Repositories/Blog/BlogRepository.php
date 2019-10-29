<?php

namespace Modules\Frontend\Repositories\Blog;

use Modules\Frontend\Models\BlogTable;

class BlogRepository implements BlogRepositoryInterface
{
    protected $blog;

    public function __construct(
        BlogTable $blog
    ) {
        $this->blog = $blog;
    }

    /**
     * Lấy danh sách tin tức
     *
     * @param array $filter
     * @return mixed
     */
    public function getList(array $filter = [])
    {
        $filter['perpage'] = 9;

        if (!isset($filter['keyword_tpcloud_cms_blog$'.getValueByLang('title_')])) {
            $filter['keyword_tpcloud_cms_blog$'.getValueByLang('title_')] = null;
        }
        $result = $this->blog->getList($filter);

        return $result;
    }

    /**
     * Lấy chi tiết tin tức
     *
     * @param string $alias
     * @param string $lang
     * @return mixed
     */
    public function getDetail($alias, $lang)
    {
        $condition = [
            ['tpcloud_cms_blog.alias_'.$lang, '=', $alias]
        ];
        $result = $this->blog->getDetail($condition);

        return $result;
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
        $result = $this->blog->getReferent($condition, $id, $limit);

        return $result;
    }
}
