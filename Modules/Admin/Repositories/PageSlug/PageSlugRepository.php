<?php


namespace Modules\Admin\Repositories\PageSlug;


use Modules\Admin\Models\PageSlugTable;

class PageSlugRepository implements PageSlugRepositoryInterface
{
    protected $page_slug;

    public function __construct(
        PageSlugTable $page_slug
    ) {
        $this->page_slug = $page_slug;
    }

    /**
     * @param $route
     * @param $alias_vi
     * @param $alias_en
     * @return array|mixed
     */
    public function add($route, $alias_vi, $alias_en)
    {
        if (isset($route)) {
            $param['route'] = $route;
            $param['alias_vi'] = $alias_vi;
            $param['alias_en'] = $alias_en;
            $this->page_slug->add($param);

            return [
                'error' => false,
                'message' => 'Thêm thành công'
            ];
        } else {
            return [
                'error' => true,
                'message' => 'Thêm thất bại'
            ];
        }
    }

    /**
     * @param $route
     * @param $alias_vi
     * @param $alias_en
     * @return mixed
     */
    public function getItem($route, $alias_vi, $alias_en)
    {
        return $this->page_slug->getItem($route, $alias_vi, $alias_en);
    }

    /**
     * @param $route
     * @param $alias_vi_new
     * @param $alias_en_new
     * @param $alias_vi_old
     * @param $alias_en_old
     * @return array|mixed
     */
    public function edit($route, $alias_vi_new, $alias_en_new, $alias_vi_old, $alias_en_old)
    {
        if (isset($route)) {
            $page_slug = $this->page_slug->getItem($route, $alias_vi_old, $alias_en_old);
            $param['route'] = $route;
            $param['alias_vi'] = $alias_vi_new;
            $param['alias_en'] = $alias_en_new;
            if (isset($page_slug)) {
                $this->page_slug->edit($param, $page_slug['id']);
            } else {
                $this->page_slug->add($param);
            }
            return [
                'error' => false,
                'message' => 'Chỉnh sửa thành công'
            ];
        } else {
            return [
                'error' => true,
                'message' => 'Chỉnh sửa thất bại'
            ];
        }
    }

    /**
     * Remove page slug
     *
     * @param $route
     * @param $alias_vi
     * @param $alias_en
     * @return array|mixed
     */
    public function remove($route, $alias_vi, $alias_en)
    {
        $page_slug = $this->page_slug->getItem($route, $alias_vi, $alias_en);

        if (isset($page_slug)) {
            $this->page_slug->remove($page_slug['id']);
        }
        return [
            'error' => false,
            'message' => 'Xóa thành công'
        ];
    }
}