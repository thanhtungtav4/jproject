<?php


namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $request;
    protected $category;
    public function __construct(Request $request, CategoryRepositoryInterface $category)
    {
        $this->request = $request;
        $this->category = $category;
    }

    public function create()
    {
        $parent_id = $this->request->all();
        return view('admin::category.create', [
            'parent_id' => $parent_id['parent_id'],
            'category' => $parent_id['category_type']
        ]);
    }

    public function edit()
    {
        $id = $this->request->route('id');
        $param = $this->request->all();
        $data = $this->category->getCategoryDetail($id);
        return view('admin::category.edit', [
            'category' => $data,
            'category_type' => $param['category']
        ]);
    }

    public function editCategory()
    {
        $param = $this->request->all();
        $data = $this->category->updateCategory($param);
        return $data;
    }

    public function createCategory()
    {
        $param = $this->request->all();
        $param['is_deleted'] = 0;
        $data = $this->category->createCategory($param);
        return $data;
    }

    public function deleteCategory()
    {
        $param = $this->request->all();
        $data = $this->category->deleteCategory($param);
        return $data;
    }
}
