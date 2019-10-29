<?php

namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Http\Requests\Support\SupportStoreRequest;
use Modules\Admin\Http\Requests\Support\SupportUpdateRequest;
use Modules\Admin\Repositories\PageSlug\PageSlugRepositoryInterface;
use Modules\Admin\Repositories\Support\SupportRepositoryInterface;

class SupportCentralController extends Controller
{
    protected $support;
    protected $page_slug;

    public function __construct(
        SupportRepositoryInterface $support,
        PageSlugRepositoryInterface $page_slug
    ) {
        $this->support = $support;
        $this->page_slug = $page_slug;
    }

    /**
     * List support.
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();
        $data = $this->support->list($filter);
        return view('admin::support.index', [
            'list' => $data['list'],
            'filter' => $data['filter']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::support.create');
    }

    /**
     * Create support
     *
     * @param SupportStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SupportStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $param = $request->all();
            $result = $this->support->add($param);

            if (isset($result['id'])) {
                $this->page_slug->add(
                    'frontend.support.detail',
                    $param['alias_vi'],
                    $param['alias_en']
                );
            }
            DB::commit();
            return response()->json([
                'error' => false,
                'message' => __('admin::validation.support.success')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => __('admin::validation.support.fail')
            ]);
        }
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
        $getItem = $this->support->getItem($id);
        return view('admin::support.edit', [
            'item' => $getItem
        ]);
    }

    /**
     * Update support
     *
     * @param SupportUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SupportUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $param = $request->all();
            //check data old
            $old = $this->support->getItem($param['id']);
            //update blog
            $result = $this->support->edit($param, $param['id']);
            //update page slug
            $this->page_slug->edit(
                'frontend.support.detail',
                $param['alias_vi'],
                $param['alias_en'],
                $old['alias_vi'],
                $old['alias_en']
            );
            DB::commit();
            return response()->json([
                'error' => false,
                'message' => __('admin::validation.support.update_success')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => __('admin::validation.support.update_fail')
            ]);
        }
    }

    /**
     * Remove support
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $support = $this->support->getItem($request->id);
        $this->page_slug->remove(
            'frontend.support.detail',
            $support['alias_vi'],
            $support['alias_en']
        );
        $this->support->remove($request->id);
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
            date_format($time, 'Y') . "_support." . $file->getClientOriginalExtension();
        $file->move(TEMP_PATH, $file_name);
        return $file_name;
    }

    /**
     * Update status support
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatusAction(Request $request)
    {
        $data = [
            'is_active' => $request->is_active
        ];
        $this->support->changeStatus($data, $request->id);
        return response()->json([
            'error' => false,
            'message' => 'Thay đổi trạng thái thành công'
        ]);
    }
}
