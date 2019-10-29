<?php


namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Http\Requests\BlogCategory\BlogCategoryStoreRequest;
use Modules\Admin\Http\Requests\BlogCategory\BlogCategoryUpdateRequest;
use Modules\Admin\Repositories\BlogCategory\BlogCategoryRepositoryInterface;
use Illuminate\Http\Request;
use Modules\Admin\Repositories\PageSlug\PageSlugRepositoryInterface;

class BlogCategoryController extends Controller
{
    protected $blog_category;
    protected $page_slug;

    public function __construct(
        BlogCategoryRepositoryInterface $blog_category,
        PageSlugRepositoryInterface $page_slug
    ) {
        $this->blog_category = $blog_category;
        $this->page_slug = $page_slug;
    }

    /**
     * List Blog Category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $filter = request()->all();
        $list = $this->blog_category->list($filter);

        return view('admin::blog-category.index', [
            'list' => $list,
            'filter' => ''
        ]);
    }

    /**
     * View create blog category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin::blog-category.add');
    }

    /**
     * Create blog category
     *
     * @param BlogCategoryStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BlogCategoryStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $param = $request->all();
            $result = $this->blog_category->add($param);
            if (isset($result['id'])) {
                $this->page_slug->add(
                    'frontend.about.news_category',
                    $param['alias_vi'],
                    $param['alias_en']
                );
            }
            DB::commit();
            return response()->json([
                'error' => false,
                'message' => __('admin::validation.blog_category.success')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            $result = [
                'error' => true,
                'message' => __('admin::validation.blog_category.fail'),
                '_message' => $e->getMessage()
            ];
            return $result;
        }
    }

    /**
     * View update blog category
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $getItem = $this->blog_category->getItem($id);
        return view('admin::blog-category.edit', [
            'item' => $getItem
        ]);
    }

    /**
     * Update blog category
     *
     * @param BlogCategoryUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BlogCategoryUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $param = $request->all();
            //check data old
            $old = $this->blog_category->getItem($param['id']);
            //update blog category
            $result = $this->blog_category->edit($param, $param['id']);
            //update page slug
            $this->page_slug->edit(
                'frontend.about.news_category',
                $param['alias_vi'],
                $param['alias_en'],
                $old['alias_vi'],
                $old['alias_en']
            );

            DB::commit();
            return response()->json([
                'error' => $result['error'],
                'message' => $result['message']
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            $result = [
                'error' => true,
                'message' => __('admin::validation.blog_category.update_fail'),
                '_message' => $e->getMessage()
            ];
            return $result;
        }
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
            date_format($time, 'Y') . "_blogCategory." . $file->getClientOriginalExtension();

        $file->move(TEMP_PATH, $file_name);
        return $file_name;
    }

    /**
     * Thay đổi trạng thái
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatusAction(Request $request)
    {
        $data = [
            'is_active' => $request->is_active
        ];

        $this->blog_category->changeStatus($data, $request->id);

        return response()->json([
            'error' => false,
            'message' => 'Thay đổi trạng thái thành công'
        ]);
    }

    /**
     * Remove blog category
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $blog_category = $this->blog_category->getItem($request->id);
        $this->page_slug->remove(
            'frontend.about.news_category',
            $blog_category['alias_vi'],
            $blog_category['alias_en']
        );
        $this->blog_category->remove($request->id);
        return response()->json([
            'error' => false,
            'message' => 'Remove success',
        ]);
    }

}