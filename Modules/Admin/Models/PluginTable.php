<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class PluginTable extends Model
{
    use ListTableTrait;

    protected $table = 'tpcloud_cms_plugin';
    protected $primaryKey = 'plugin_id';
    protected $fillable = [
        'plugin_id',
        'plugin_type',
        'plugin_title_vi',
        'plugin_title_en',
        'plugin_image',
        'icon_1',
        'icon_2',
        'icon_3',
        'plugin_content_vn',
        'plugin_content_en',
        'plugin_content_other_vn',
        'plugin_content_other_en',
        'plugin_order',
        'plguin_btn_name',
        'plugin_float',
        'plugin_text_icon_vi',
        'plugin_text_icon2_vi',
        'plugin_text_icon3_vi',
        'plugin_text_icon_en',
        'plugin_text_icon2_en',
        'plugin_text_icon3_en',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
        'is_deleted'
    ];

    public function getListCore($filter = [])
    {
        $ds = $this->where('is_deleted', 0);
//        if (isset($filter['plugin_title_vi'])){
//            $ds = $ds->where('plugin_title_vi','like', '%'.$filter['plugin_title_vi']. '%');
//        }
//        if (isset($filter['plugin_title_en'])){
//            $ds->where('plugin_title_en','like', '%'.$filter['plugin_title_en'].'%');
//        }
        $ds = $ds->orderBy('updated_at', 'desc');
        return $ds;

//        $oSelect = $this
//            ->where('is_deleted', 0);
//        if (isset($filter['plugin_title_vi']))
//            $oSelect->where('plugin_title_vi','LIKE', '%' . $filter['plugin_title_vi'] . '%');
//        if (isset($filter['plugin_title_en']))
//            $oSelect->where('plugin_title_en','like', '%' . $filter['plugin_title_en'] . '%');
//
//        $oSelect =  $oSelect->orderBy('updated_at', 'desc');
//        return $oSelect;
    }

//    public function getListPlugin($page_id, $plugin_type)
//    {
//        $oSelect = $this
//            ->where('tpcloud_cms_plugin.plugin_type', $plugin_type)
//            ->where('is_deleted', 0)
//            ->get();
//        return $oSelect;
//    }

    public function createPlugin($data)
    {
        $oSelect = $this->insertGetId($data);
        return $oSelect;
    }

    public function updatePlugin($plugin_id, $data)
    {
        $oSelect = $this
            ->where('plugin_id', $plugin_id)
            ->update($data);
        return $oSelect;
    }

    public function getDetail($plugin_id)
    {
        $oSelect = $this->where('tpcloud_cms_plugin.plugin_id', $plugin_id)->first();
        return $oSelect;
    }

    public function deletePlugin($filter)
    {
        $oSelect = $this->where('plugin_id' , $filter['id'])->update(['is_deleted' => 1]);
        return $oSelect;
    }

    public function changStatus($id,$is_active)
    {
        $oSelect = $this->where('plugin_id' , $id)->update(['is_active' => $is_active]);
        return $oSelect;
    }
}
