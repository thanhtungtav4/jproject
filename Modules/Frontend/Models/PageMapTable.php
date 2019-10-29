<?php

namespace Modules\Frontend\Models;

class PageMapTable extends BaseModel
{
    protected $table = 'tpcloud_cms_page_map';
    protected $primaryKey = 'page_map_id';

    /**
     *Lấy danh sách plugin theo trang
     *
     * @param $filters
     * @return array
     */
    public function getFunctionByPage($filters)
    {
        $oSelect = $this->from($this->table.' as map')
                ->join('tpcloud_cms_plugin as plugin', function ($join) {
                    $join->on('plugin.plugin_id', '=', 'map.plugin_id')
                        ->where('plugin.is_deleted', 0)
                        ->where('plugin.is_active', 1);
                })
                ->where('type', 'plugin')
                ->where('page_id', $filters['page_id'])
                ->orderBy('plugin.plugin_order', 'ASC');
        return $this->makeResult($oSelect);
    }

    /**
     *Lấy danh sách sản phẩm theo trang
     *
     * @param array $filters
     * @return array
     */
    public function getFunctionProductByPage($filters)
    {
        $oSelect = $this->from($this->table.' as map')
            ->join('tpcloud_cms_page as product', function ($join) {
                $join->on('product.page_id', '=', 'map.plugin_id')
                    ->where('product.is_active', 1);
            })
            ->where('type', $filters['type'])
            ->where('map.page_id', $filters['page_id']);
        return $this->makeResult($oSelect);
    }
}
