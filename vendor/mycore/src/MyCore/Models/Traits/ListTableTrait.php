<?php

namespace MyCore\Models\Traits;

trait ListTableTrait
{
    /**
     * Get Table list
     * 
     * @param array $filter
     * @return mixed
     */
    public function getList(array $filter = [])
    {
        $select  = $this->getListCore($filter);
        $page    = (int) ($filter['page'] ?? 1);
        $display = (int) ($filter['perpage'] ?? PAGING_ITEM_PER_PAGE);

        unset($filter['page'], $filter['perpage']);

        if (count($filter) > 0) {
            foreach ($filter as $key => $val) {
                if (trim($val) == '') {
                    continue;
                }
                
                if (strpos($key, 'keyword_') !== false) {
                    $select->where(str_replace('$', '.', str_replace('keyword_', '', $key)), 'like', '%' . $val . '%');
                } elseif (strpos($key, 'sort_') !== false) {
                    $select->orderBy(str_replace('$', '.', str_replace('sort_', '', $key)), $val);
                } else {
                    $select->where(str_replace('$', '.', $key), $val);
                }
            }
        }

        return $select->paginate($display, $columns = ['*'], $pageName = 'page', $page);
    }
}
