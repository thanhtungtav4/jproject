<?php


namespace Modules\Admin\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Http\Requests\Blog\BlogStoreRequest;
use Modules\Admin\Http\Requests\Blog\BlogUpdateRequest;
use Modules\Admin\Repositories\Blog\BlogRepositoryInterface;
use Modules\Admin\Repositories\BlogCategory\BlogCategoryRepositoryInterface;
use Modules\Admin\Repositories\PageSlug\PageSlugRepositoryInterface;

class BlogController extends Controller
{
    protected $blog;
    protected $blog_category;
    protected $page_slug;

    public function __construct(
        BlogRepositoryInterface $blog,
        BlogCategoryRepositoryInterface $blog_category,
        PageSlugRepositoryInterface $page_slug
    ) {
        $this->blog = $blog;
        $this->blog_category = $blog_category;
        $this->page_slug = $page_slug;
    }

    /**
     * List blog
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $filter = request()->all();
        $list = $this->blog->list($filter);

        return view('admin::blog.index', [
            'list' => $list,
            'filter' => ''
        ]);
    }

    /**
     * Create blog
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $optionBlogCategory = $this->blog_category->getOptionBlogCategory();
        return view('admin::blog.create', [
            'optionBlogCategory' => $optionBlogCategory
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
            date_format($time, 'Y') . "_blog." . $file->getClientOriginalExtension();

        $file->move(TEMP_PATH, $file_name);
        return $file_name;
    }

    /**
     * Create blog
     *
     * @param BlogStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BlogStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $param = $request->all();
            $result = $this->blog->add($param);

            if (isset($result['id'])) {
                $this->page_slug->add(
                    'frontend.about.news_detail',
                    $param['alias_vi'],
                    $param['alias_en']
                );
            }
            DB::commit();
            return response()->json([
                'error' => false,
                'message' => __('admin::validation.blog.success')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => __('admin::validation.blog.fail')
            ]);
        }
    }

    /**
     * Edit blog
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $optionBlogCategory = $this->blog_category->getOptionBlogCategory();
        $getItem = $this->blog->getItem($id);
        return view('admin::blog.edit', [
            'item' => $getItem,
            'optionBlogCategory' => $optionBlogCategory
        ]);
    }

    /**
     * Update blog
     *
     * @param BlogUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BlogUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $param = $request->all();
            //check data old
            $old = $this->blog->getItem($param['id']);
            //update blog
            $result = $this->blog->edit($param, $param['id']);
            //update page slug
            $this->page_slug->edit(
                'frontend.about.news_detail',
                $param['alias_vi'],
                $param['alias_en'],
                $old['alias_vi'],
                $old['alias_en']
            );
            DB::commit();
            return response()->json([
                'error' => false,
                'message' => __('admin::validation.blog.update_success')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => __('admin::validation.blog.update_fail')
            ]);
        }
    }

    /**
     * Remove blog
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $blog = $this->blog->getItem($request->id);
        $this->page_slug->remove('frontend.about.news_detail', $blog['alias_vi'], $blog['alias_en']);
        $this->blog->remove($request->id);
        return response()->json([
            'error' => false,
            'message' => 'Remove success',
        ]);
    }
}
