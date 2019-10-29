<?php

namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\Config\ConfigUpdateRequest;
use Modules\Admin\Repositories\Config\ConfigRepositoryInterface;

class ConfigController extends Controller
{
    protected $config;

    public function __construct(
        ConfigRepositoryInterface $config
    ) {
        $this->config = $config;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();
        $list = $this->config->list($filter);
        return view('admin::config.index', [
            'list' => $list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * View edit config.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $getItem = $this->config->getItem($id);
//        dd($getItem);
        return view('admin::config.edit', [
            'item' => $getItem
        ]);
    }


    public function update(ConfigUpdateRequest $request)
    {
        $param = $request->all();
        $result = $this->config->edit($param, $param['id']);
        return response()->json([
            'error' => $result['error'],
            'message' => $result['message']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Upload image
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadAction(Request $request)
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
            date_format($time, 'Y') . "_config." . $file->getClientOriginalExtension();

        $file->move(TEMP_PATH, $file_name);
        return $file_name;
    }
}
