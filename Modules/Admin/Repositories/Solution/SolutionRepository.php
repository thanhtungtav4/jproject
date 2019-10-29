<?php


namespace Modules\Admin\Repositories\Solution;

use Illuminate\Http\Request;
use Modules\Admin\Models\SolutionTable;
use Modules\Admin\Models\PluginTable;

class SolutionRepository implements SolutionRepositoryInterface
{
    protected $request;
    protected $plugin;
    protected $map;
    public function __construct(Request $request, PluginTable $plugin, SolutionTable $map)
    {
        $this->request = $request;
        $this->plugin = $plugin;
        $this->map = $map;
    }

    public function getList(array $data = [])
    {
        return $this->plugin->getListPlugin($data['page_id'], $data['plugin_type']);
    }

    public function getListSolutionPage($page_id)
    {
        return $this->map->getListPageSolution($page_id);
    }

    public function addPlugin(array $data = [])
    {
        $tmp = $this->map->addPlugin($data);
        if ($tmp == true)
        {
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
        if ($tmp == true)
        {
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
