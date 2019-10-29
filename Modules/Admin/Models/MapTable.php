<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class MapTable extends Model
{
    use ListTableTrait;
    protected $table = 'tpcloud_cms_page_map';
    protected $primaryKey = 'plugin_map_id';
    protected $fillable = [
        'plugin_map_id',
        'page_id',
        'plugin_id',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    public function getListCore(&$filter = [])
    {
        if ($filter['type'] == 'plugin') {
            $oSelect = $this
                ->leftJoin('tpcloud_cms_plugin', 'tpcloud_cms_plugin.plugin_id', 'tpcloud_cms_page_map.plugin_id')
                ->where('tpcloud_cms_page_map.page_id', $filter['page_id'])
                ->where('tpcloud_cms_plugin.plugin_type', $filter['plugin_type'])
                ->where('tpcloud_cms_page_map.type', $filter['type']);
            return $oSelect;
        } else {
            $oSelect = $this
                ->leftJoin('tpcloud_cms_page', 'tpcloud_cms_page.page_id', 'tpcloud_cms_page_map.plugin_id')
                ->where('tpcloud_cms_page_map.page_id', $filter['page_id'])
                ->where('tpcloud_cms_page.page_type', $filter['page_type'])
                ->where('tpcloud_cms_page_map.type', $filter['type']);
            unset($filter['page_id']);
            unset($filter['page_type']);
            unset($filter['type']);
            return $oSelect;
        }
    }
    public function getListPageMap($page_id)
    {
        $oSelect = $this->where('page_id', $page_id)->get();
        return $oSelect;
    }
    public function addPlugin($filter)
    {
        $oSelect = $this
            ->where('page_id', $filter['page_id'])
            ->where('plugin_id', $filter['plugin_id'])
            ->where('type', $filter['type']);
        if ($oSelect->count() == 0) {
            $oSelect = $oSelect->insert($filter);
            return true;
        } else {
            return false;
        }
    }

    public function deletePlugin($filter)
    {
//        $oSelect = $this
//            ->where('page_id', $filter['page_id'])
//            ->where('plugin_id', $filter['plugin_id'])
//            ->where('type',$filter['type'])
//            ->delete($filter);
//        return $oSelect;

        $oSelect = $this
            ->where('page_id', $filter['page_id'])
            ->where('plugin_id', $filter['plugin_id'])
            ->where('type', $filter['type'])
            ->delete($filter);
        return true;
//        if ($oSelect->count() == 0)
//        {
//            $oSelect = $oSelect->delete($filter);
//            return true;
//        } else {
//            return false;
//        }
    }
}
