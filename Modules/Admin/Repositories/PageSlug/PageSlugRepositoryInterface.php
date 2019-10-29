<?php


namespace Modules\Admin\Repositories\PageSlug;


interface PageSlugRepositoryInterface
{

    /**
     * @param $route
     * @param $alias_vi
     * @param $alias_en
     * @return mixed
     */
    public function add($route, $alias_vi, $alias_en);

    /**
     * @param $route
     * @param $alias_vi
     * @param $alias_en
     * @return mixed
     */
    public function getItem($route, $alias_vi, $alias_en);

    /**
     * @param $route
     * @param $alias_vi_new
     * @param $alias_en_new
     * @param $alias_vi_old
     * @param $alias_en_old
     * @return mixed
     */
    public function edit($route, $alias_vi_new, $alias_en_new, $alias_vi_old, $alias_en_old);

    /**
     * @param $route
     * @param $alias_vi
     * @param $alias_en
     * @return mixed
     */
    public function remove($route, $alias_vi, $alias_en);
}