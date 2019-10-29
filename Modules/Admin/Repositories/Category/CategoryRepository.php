<?php


namespace Modules\Admin\Repositories\Category;


use Modules\Admin\Models\CategoryTable;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $category;
    public function __construct(CategoryTable $category)
    {
        $this->category = $category;
    }

    public function getListCategory(array $filter=[])
    {
//        unset($filter['category_type']);
        return $this->category->getList($filter);
    }

    public function getCategoryDetail($id)
    {
        return $this->category->getCategoryDetail($id);
    }

    public function createCategory(array $filter = [])
    {
        if ($filter['name_vi'] == null){
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tiêu đề tiếng Việt'
            ]);
        } else if ($filter['name_en'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tiêu đề tiếng Anh'
            ]);
        } else if ($filter['ordering'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập vị trí'
            ]);
        } else {
            $arr = [];
            foreach ($filter as $key => $value)
            {
                if ($key == 'name_vi' || $key == 'name_en'){
                    $arr[$key] = strip_tags($value);
                } else {
                    $arr[$key] = $value;
                }
            }
            $validator = \Validator::make($arr, [
                'name_vi' => 'max:250',
                'name_en' => 'max:250',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => 'Tiêu đề vượt quá 250 ký tự'
                ]);
            } else {
                $validator = \Validator::make($arr, [
                    'ordering' => 'required|integer|numeric|min:0|max:50',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'error' => true,
                        'message' => 'Yêu cầu nhập vị trí từ 0 đến 50'
                    ]);
                } else {
                    $this->category->createCategory($arr);
                    return response()->json([
                        'error' => false,
                        'message' => 'Tạo thành công'
                    ]);
                }
            }
        }
    }

    public function updateCategory(array $filter = [])
    {
        $id = $filter['id'];
        unset($filter['id']);
        if ($filter['name_vi'] == null){
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tiêu đề tiếng Việt'
            ]);
        } else if ($filter['name_en'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tiêu đề tiếng Anh'
            ]);
        } else if ($filter['ordering'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập vị trí'
            ]);
        } else {
            $arr = [];
            foreach ($filter as $key => $value)
            {
                if ($key == 'name_vi' || $key == 'name_en'){
                    $arr[$key] = strip_tags($value);
                } else {
                    $arr[$key] = $value;
                }
            }

            $validator = \Validator::make($arr, [
                'name_vi' => 'max:250',
                'name_en' => 'max:250',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => 'Tiêu đề vượt quá 250 ký tự'
                ]);
            } else {
                $validator = \Validator::make($arr, [
                    'ordering' => 'required|integer|numeric|min:0|max:50',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'error' => true,
                        'message' => 'Yêu cầu nhập vị trí từ 0 đến 50'
                    ]);
                } else {
                    $this->category->updateCategory($id,$arr);
                    return response()->json([
                        'error' => false,
                        'message' => 'Cập nhật thành công'
                    ]);
                }
            }
        }
    }

    public function deleteCategory(array $filter = [])
    {
        $data = $this->category->deleteCategory($filter);
        return response()->json([
            'error' => false,
            'message' => 'Xóa thành công'
        ]);
    }
}
