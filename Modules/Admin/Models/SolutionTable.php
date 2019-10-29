<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class SolutionTable extends Model
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

    public function getListPageSolution($page_id)
    {
        $oSelect = $this->where('page_id',$page_id)->get();

        return $oSelect;
    }
    public function addPlugin($filter)
    {
        $oSelect = $this
            ->where('page_id',$filter['page_id'])
            ->where('plugin_id',$filter['plugin_id'])
            ->where('type',$filter['type']);
        if ($oSelect->count() == 0)
        {
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
            ->where('page_id',$filter['page_id'])
            ->where('plugin_id',$filter['plugin_id'])
            ->where('type',$filter['type']);
        if (count($oSelect) == 1)
        {
            $oSelect = $oSelect->delete($filter);
            return true;
        } else {
            return false;
        }
    }
}
