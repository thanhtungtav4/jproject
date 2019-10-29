<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\Faq\FaqStoreRequest;
use Modules\Admin\Http\Requests\Faq\FaqUpdateRequest;
use Modules\Admin\Repositories\Faq\FaqRepositoryInterface;

class FaqController extends Controller
{
    protected $faq;

    public function __construct(
        FaqRepositoryInterface $faq
    ) {
        $this->faq = $faq;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();
        $data = $this->faq->list($filter);
        return view('admin::faq.index', [
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
        return view('admin::faq.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(FaqStoreRequest $request)
    {
        $param = $request->all();
        $result = $this->faq->add($param);
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
     * View edit faq
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $getItem = $this->faq->getItem($id);
        return view('admin::faq.edit', [
            'item' => $getItem
        ]);
    }

    /**
     * Update faq
     *
     * @param FaqUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(FaqUpdateRequest $request)
    {
        $param = $request->all();
        $result = $this->faq->edit($param, $param['id']);
        return response()->json([
            'error' => $result['error'],
            'message' => $result['message']
        ]);
    }

    /**
     * Remove faq
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->faq->remove($request->id);

        return response()->json([
            'error' => false,
            'message' => 'Remove success',
        ]);
    }

    /**
     * Change status faq
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatusAction(Request $request)
    {
        $data=[
            'is_active' => $request->is_active
        ];
        $this->faq->changeStatus($data, $request->id);
        return response()->json([
            'error' => false,
            'message' => 'Thay đổi trạng thái thành công'
        ]);
    }
}
