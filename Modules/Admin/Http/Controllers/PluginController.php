<?php


namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Repositories\Plugin\PluginRepositoryInterface;

class PluginController extends Controller
{
    protected $request;
    protected $plugin;
    public function __construct(Request $request, PluginRepositoryInterface $plugin)
    {
        $this->request = $request;
        $this->plugin = $plugin;
    }

    public function create()
    {
        $param = $this->request->all();
        return view('admin::plugin.create', [
            'page_id' => $param['page_id'],
            'plugin_type' => $param['plugin_type'],
            'param' => $param
        ]);
    }
    public function create_solution()
    {
        $param = $this->request->all();
        return view('admin::plugin.create', [
            'page_id' => $param['page_id'],
            'plugin_type' => $param['plugin_type'],
            'param' => $param
        ]);
    }

    public function createPlugin()
    {
        $param = $this->request->all();
        $data = $this->plugin->createPlugin($param);
        return $data;
    }

    public function editPlugin()
    {
        $url = $this->request->all();
        $param = $this->request->route('plugin_id');
        $data = $this->plugin->getDetailPlugin($param);
        return view('admin::plugin.edit', [
            'detail' => $data,
            'param' => $url
        ]);
    }

    public function updatePlugin()
    {
        $param = $this->request->all();
        $data = $this->plugin->updatePlugin($param);
        return $data;
    }

    public function deletePlugin()
    {
        $param = $this->request->all();
        $data = $this->plugin->deletePlugin($param);
        return $data;
    }

    /**
     * Upload image
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage(Request $request)
    {
        if ($request->file('file') != null) {
            $file = $this->uploadImageTemp($request->file('file'));
            return response()->json(["file" => $file, "success" => "1"]);
        }
    }


    /**
     * Lưu ảnh vào folder temp
     *
     * @param $file
     * @return string
     */
    private function uploadImageTemp($file)
    {
        $time = Carbon::now();
        $file_name = rand(0, 9) . time() .
            date_format($time, 'd') .
            date_format($time, 'm') .
            date_format($time, 'Y') . "_page." . $file->getClientOriginalExtension();

        $file->move(TEMP_PATH, $file_name);
        return $file_name;
    }

    public function changeStatus()
    {
        $param = $this->request->all();
        $data = $this->plugin->changStatus($param['id'],$param['is_active']);
        return $data;
    }
}
