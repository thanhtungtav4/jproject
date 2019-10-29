<?php

namespace Modules\Frontend\Models;

class ProductPriceTable extends BaseModel
{
    protected $table = 'tpcloud_cms_product_price';
    protected $primaryKey = 'id';

    /**
     * Lấy danh sách bảng giá theo trang
     *
     * @param int $pageId
     * @return mixed
     */
    public function getListAllByPage($pageId)
    {
        $result = $this->join('tpcloud_cms_page as page', function ($join) use ($pageId) {
            $join->on('page.page_id', '=', $this->table.'.page_id')
                ->where('page.is_active', 1)
                ->where('page.page_id', $pageId);
        })
            ->where($this->table.'.is_deleted', 0)
            ->where($this->table.'.is_active', 1)
            ->get();

        return $result;
    }
}
