<?php

namespace Modules\Frontend\Models;

class PageTable extends BaseModel
{
    protected $table = 'tpcloud_cms_page';
    protected $primaryKey = 'page_id';

    public function getAllPageProduct()
    {
        $oSelect = $this->where('page_type', 'product')
            ->where('is_active', 1)
            ->orderBy('page_position', 'desc');
        return $this->makeResult($oSelect);
    }

    public function getAllPageSolution()
    {
        $oSelect = $this->where('page_type', 'solution')->where('is_active', 1)->orderBy('page_position', 'desc');
        return $this->makeResult($oSelect);
    }

    /**
     * Lấy thông tin trang hiện tại
     *
     * @param int|array $condition
     * @return array
     */
    public function getCurrentPage($condition)
    {
        $oSelect = $this->orderBy('page_position', 'desc');

        if (is_array($condition)) {
            $oSelect->where($condition);
        } else {
            $oSelect->where('page_id', $condition);
        }

        return $this->makeResult($oSelect);
    }

    public function getCurrentPageByType($condition)
    {
        $oSelect = $this->orderBy('page_position', 'desc');

        if (is_array($condition)) {
            $oSelect->where($condition);
        } else {
            $oSelect->where('page_type', $condition);
        }

        return $this->makeResult($oSelect);
    }

    public function getListSolution()
    {
        $oSelect = $this->where('page_type', 'solution-list')
                    ->orWhere('page_type', 'solution-list-child')->get();
        return $oSelect;

//        $oSelect = $this
//            ->join('tpcloud_cms_category as category','category.id','tpcloud_cms_page.category_id')
//            ->where('category.parent_id',4)
//            ->orWhere('category.id',4)
//            ->where('page_type', 'solution-list')
//            ->orWhere('page_type', 'solution-list-child')
//            ->get();
//
//        if (count($oSelect) > 0) {
//            foreach ($oSelect as $key => $value) {
//                $result[$value['category_id']][] = $value;
//            }
//        }
//
//        dd($result);


        return $oSelect;

    }
}
