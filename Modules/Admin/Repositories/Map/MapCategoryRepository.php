<?php


namespace Modules\Admin\Repositories\Map;

use Illuminate\Http\Request;
use Modules\Admin\Models\MapTable;
use Modules\Admin\Models\PluginTable;

class MapCategoryRepository implements MapCategoryRepositoryInterface
{
    protected $request;
    protected $plugin;
    protected $map;
    public function __construct(Request $request, PluginTable $plugin, MapTable $map)
    {
        $this->request = $request;
        $this->plugin = $plugin;
        $this->map = $map;
    }

    public function getList(array $data = [])
    {
        unset($data['page_id']);
//        return $this->plugin->getListPlugin($data['page_id'], $data['plugin_type']);
        return $this->plugin->getList($data);
    }

    public function getListMapPage($page_id)
    {
        return $this->map->getListPageMap($page_id);
    }

    public function getListMapPageId(array $data = [])
    {
        unset($data['action']);
        return $this->map->getList($data);
    }

    public function addPlugin(array $data = [])
    {
        $tmp = $this->map->addPlugin($data);
        if ($tmp == true) {
            return response()->json([
                'error' => false,
                'message' => 'Thêm thành công'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Thêm thất bại'
            ]);
        }
    }

    public function deletePlugin(array $data = [])
    {
        $tmp = $this->map->deletePlugin($data);
        if ($tmp == true) {
            return response()->json([
                'error' => false,
                'message' => 'Hủy thành công'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Hủy thất bại'
            ]);
        }
    }
}
