<?php

namespace Modules\Frontend\Repositories\Blog;

interface BlogRepositoryInterface
{
    public function getList(array $filter = []);

    /**
     * Lấy chi tiết tin tức
     *
     * @param string $alias
     * @param string $lang
     * @return mixed
     */
    public function getDetail($alias, $lang);

    /**
     * Lấy bài viết liên quan
     *
     * @param array $condition
     * @param int $id
     * @param int $limit
     * @return mixed
     */
    public function getReferent(array $condition, $id, $limit = 3);
}
