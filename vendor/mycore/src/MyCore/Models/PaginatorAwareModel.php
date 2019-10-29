<?php
namespace MyCore\Models;

use Illuminate\Support\HtmlString;
use Traversable;

/**
 * Created by PhpStorm.
 * User: phuoc
 * Date: 11/19/2018
 * Time: 3:29 PM
 */
class PaginatorAwareModel implements \IteratorAggregate
{
    private $items = [];
    private $paginatorInfo = [];

    public function __construct($data)
    {
        $this->items         = $data['Items'];
        $this->paginatorInfo = $data['PageInfo'];
    }

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return (function () {
            foreach ($this->items as $key => $val) {
                yield $key => $val;
            }
            //while(list($key, $val) = each($this->items)) {
            //    yield $key => $val;
            //}
        })();
    }


    public function toArray()
    {
        return $this->items;
    }


    /**
     * Lay thong tin paging
     *
     * @return array
     */
    public function getPaginatorInfo()
    {
        return $this->paginatorInfo;
    }


    /**
     * Render the paginator using the given view.
     *
     * @param  string|null  $view
     * @param  array  $data
     * @return \Illuminate\Support\HtmlString
     */
    public function links($view = null, $data = [])
    {
        return $this->render($view, $data);
    }


    /**
     * Render the paginator using the given view.
     *
     * @param  string|null  $view
     * @param  array  $data
     * @return \Illuminate\Support\HtmlString
     */
    public function render($view = null, $data = [])
    {

        return new HtmlString(view($view, [
            'paginator' => $this->getPaginatorInfo()
        ]));
    }


    /**
     * Count number items of object
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }
}
