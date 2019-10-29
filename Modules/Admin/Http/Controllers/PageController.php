<?php


namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admin\Repositories\Category\CategoryRepositoryInterface;
use Modules\Admin\Repositories\Page\PageRepositoryInterface;

class PageController extends Controller
{
    protected $page;
    protected $request;
    protected $category;
    public function __construct(Request $request, PageRepositoryInterface $page, CategoryRepositoryInterface $category)
    {
        $this->page = $page;
        $this->request = $request;
        $this->category = $category;
    }

    public function createPage()
    {
        $param = $this->request->all();
        if (isset($param['page_id'])) {
            $page_id = $param['page_id'];
        } else {
            $page_id = 0;
        }
        $parent_id['parent_id'] = $param['category_id'];
        $category = $this->category->getListCategory($parent_id);
        return view('admin::page.create', [
            'page_type' => $param['page_type'],
            'page_id' => $page_id,
            'category' => $category,
            'category_id' => $param['category_id']
        ]);
    }

    public function createPagePost()
    {
        $param = $this->request->all();
        $data = $this->page->createPage($param);
        return $data;
    }

    public function deletePagePost()
    {
        $param = $this->request->all();
        $data = $this->page->deletePage($param);
        return $data;
    }

    public function changeStatus()
    {
        $param = $this->request->all();
        $data = $this->page->changeStatus($param);
        return $data;
    }

    public function editPage()
    {
        $idPage = $this->request->route('id');
        $param = $this->request->all();
        if (isset($param['page_id'])) {
            $page_id = $param['page_id'];
        } else {
            $page_id = 0;
        }
        $parent_id['parent_id'] = $this->request->route('category');
        $category = $this->category->getListCategory($parent_id);
        $data = $this->page->getPageDetail($idPage);
        return view('admin::page.edit', [
            'page' => $data,
            'category' => $category,
            'category_id' => $parent_id['parent_id'],
            'param' => $param,
            'idPage' => $idPage,
            'page_id' => $page_id,
            'page_type' => $param['page_type'],
        ]);
    }

    public function editPagePost()
    {
        $param = $this->request->all();
        $data = $this->page->editPage($param);
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
            date_format($time, 'Y') . "_plugin." . $file->getClientOriginalExtension();

        $file->move(TEMP_PATH, $file_name);
        return $file_name;
    }

    /**
     * Upload image
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadBackground(Request $request)
    {
        if ($request->file('file') != null) {
            $file = $this->uploadBackgroundTemp($request->file('file'));
            return response()->json(["file" => $file, "success" => "1"]);
        }
    }


    /**
     * Lưu ảnh vào folder temp
     *
     * @param $file
     * @return string
     */
    private function uploadBackgroundTemp($file)
    {
        $time = Carbon::now();
        $file_name = rand(0, 9) . time() .
            date_format($time, 'd') .
            date_format($time, 'm') .
            date_format($time, 'Y') . "_background." . $file->getClientOriginalExtension();

        $file->move(TEMP_PATH, $file_name);
        return $file_name;
    }
}
