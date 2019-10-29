<?php


namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;

class PageSlugTable extends Model
{
    protected $table = 'tpcloud_cms_page_slug';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'route',
        'alias_vi',
        'alias_en'
    ];

    /**
     * Create page slug
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $add = $this->create($data);
        return $add->id;
    }

    /**
     * Get value page slug
     *
     * @param $route
     * @param $alias_vi
     * @param $alias_en
     * @return mixed
     */
    public function getItem($route, $alias_vi, $alias_en)
    {
        $item = $this
                ->where('route', $route)
                ->where('alias_vi', $alias_vi)
                ->where('alias_en', $alias_en)
                ->first();
        return $item;
    }

    /**
     * Update page slug
     *
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        return $this->where('id', $id)->update($data);
    }

    /**
     * Remove page slug
     *
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->where('id', $id)->delete();
    }
}