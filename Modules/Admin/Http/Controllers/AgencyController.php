<?php

namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\Agency\AgencyStoreRequest;
use Modules\Admin\Http\Requests\Agency\AgencyUpdateRequest;
use Modules\Admin\Repositories\Agency\AgencyRepositoryInterface;

class AgencyController extends Controller
{
    protected $agency;

    public function __construct(
        AgencyRepositoryInterface $agency
    ) {
        $this->agency = $agency;
    }

    /**
     * List agency
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();
        $data = $this->agency->list($filter);
        return view('admin::agency.index', [
            'list' => $data['list'],
            'filter' => $data['filter']
        ]);
    }

    /**
     * Create agency.
     * @return Response
     */
    public function create()
    {
        return view('admin::agency.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(AgencyStoreRequest $request)
    {
        $param = $request->all();
        $result = $this->agency->add($param);
        return response()->json([
            'error' => $result['error'],
            'message' => $result['message']
        ]);
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
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $getItem = $this->agency->getItem($id);
        return view('admin::agency.edit', [
            'item' => $getItem
        ]);
    }

    /**
     * Update agency
     *
     * @param AgencyUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AgencyUpdateRequest $request)
    {
        $param = $request->all();
        $result = $this->agency->edit($param, $param['id']);
        return response()->json([
            'error' => $result['error'],
            'message' => $result['message']
        ]);
    }

    /**
     * Remove agency
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->agency->remove($request->id);

        return response()->json([
            'error' => false,
            'message' => 'Remove success',
        ]);
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
            date_format($time, 'Y') . "_agency." . $file->getClientOriginalExtension();

        $file->move(TEMP_PATH, $file_name);
        return $file_name;
    }

    /**
     * Change status agency
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatusAction(Request $request)
    {
        $data=[
            'is_active' => $request->is_active
        ];
        $this->agency->changeStatus($data, $request->id);
        return response()->json([
            'error' => false,
            'message' => 'Thay đổi trạng thái thành công'
        ]);
    }

}
