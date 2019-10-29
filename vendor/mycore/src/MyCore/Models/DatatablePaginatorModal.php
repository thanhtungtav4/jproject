<?php
/**
 * Created by PhpStorm.
 * User: tuanva
 * Date: 12/1/18
 * Time: 10:51 PM
 */

namespace MyCore\Models;

use Traversable;

class DatatablePaginatorModal implements \IteratorAggregate
{

    private $result = [];

    public function __construct($data)
    {
        $meta = [
            'page' => 1,
            'pages' => 1,
            'perpage' => '10',
            'total' => 1,
        ];

        if ($data['PageInfo'] != null){
            $perpage = $data['PageInfo']['itemPerPage'];
            $pages = $data['PageInfo']['lastPage'];
            $total = $data['PageInfo']['total'];
            $page = $page = $data['PageInfo']['currentPage'];

            if ($total< (int)$perpage) $page = 1;
            $meta = [
                'page' => $page,
                'pages' => $pages,
                'perpage' => $perpage,
                'total' => $total,
            ];
        };
        $this->result = [
            'meta'=>$meta,
            'data'=>$data['Items']
        ];

    }

    /**
     * @return mixed|Traversable
     */

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return (function () {
            foreach ($this->items as $key => $val) {
                yield $key => $val;
            }

        })();
    }

    public function toArray()
    {
        return $this->result;
    }


}
