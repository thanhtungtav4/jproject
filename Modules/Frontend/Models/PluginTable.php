<?php

namespace Modules\Frontend\Models;

class PluginTable extends BaseModel
{
    protected $table = 'tpcloud_cms_plugin';
    protected $primaryKey = 'plugin_id';

    public function getSolutionList($filter)
    {
        $oSelect = $this->where('plugin_type',$filter)->limit(8)->get();
        return $oSelect;
    }
}
