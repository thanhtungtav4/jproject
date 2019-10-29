<?php


namespace Modules\Admin\Repositories\Plugin;

interface PluginRepositoryInterface
{
    public function createPlugin(array $data = []);
    public function updatePlugin(array $data = []);
    public function deletePlugin(array $data = []);
    public function changStatus($id,$is_active);
    public function getDetailPlugin($plugin_id);
    public function transferTempfileToAdminfile($filename);
}
