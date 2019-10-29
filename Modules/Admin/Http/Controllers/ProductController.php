<?php


namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admin\Repositories\Category\CategoryRepositoryInterface;
use Modules\Admin\Repositories\Page\PageRepositoryInterface;
use Modules\Admin\Repositories\ProductPrice\ProductPriceRepositoryInterface;

class ProductController extends Controller
{
    protected $category;
    protected $page;
    protected $request;
    protected $productPrice;
    public function __construct(
        CategoryRepositoryInterface $category,
        Request $request,
        PageRepositoryInterface $page,
        ProductPriceRepositoryInterface $productPrice
    ) {
        $this->category = $category;
        $this->request = $request;
        $this->page = $page;
        $this->productPrice = $productPrice;
    }

    public function listCategoryProduct()
    {
        $filter = $this->request->all();
        $paren_id = [
            'parent_id' => 3,
            'category_type' => 'product'
        ];
        $filter['parent_id'] = 3;
        $category_type = 'product';
        $category = $this->category->getListCategory($filter);
        return view('admin::product.category', [
            'category' => $category,
            'paren_id' => $paren_id,
            'filter' => $filter
        ]);
    }

    public function listProduct()
    {
        $filter = $this->request->all();
        $page_type = 'product';
        $category_id = '3';
        $filter['page_type'] = 'product';
        $data = $this->page->getPage($filter);
        return view('admin::product.product', [
            'product' => $data,
            'page_type' => $page_type,
            'category_id' => $category_id,
            'filter' => $filter
        ]);
    }

    public function blockProduct()
    {
        $param = $this->request->route('page_alias_vi');
        $idPage = $this->page->getPageId($param);
        return view('admin::product.block-product', [
            'page_id' => $idPage['page_id'],
            'title' => $idPage['page_title_vi']
        ]);
    }

    public function createProductPrice()
    {
        $param = $this->request->all();
        $page_type = 'product-price';
        return view('admin::product-price.create', [
            'page_id' => $param['page_id'],
            'page_type' => $page_type,
        ]);
    }

    public function editProductPrice()
    {
        $param = $this->request->route('id');
        $page = $this->request->all();
        $page_type = 'product-price';
        $data = $this->productPrice->getProductPriceDetail($param);
        return view('admin::product-price.edit', [
            'detail' => $data,
            'page_id' => $page['page_id'],
            'page_type' => $page_type,
        ]);
    }

    public function createProductPricePost()
    {
        $param = $this->request->all();
        $tmp = $this->productPrice->createProductPrice($param);
        return $tmp;
    }

    public function updateProductPricePost()
    {
        $param = $this->request->all();
        $tmp = $this->productPrice->updateProductPrice($param);
        return $tmp;
    }

    public function changeProductPricePost()
    {
        $param = $this->request->all();
        $data = $this->productPrice->changeProductPrice($param);
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
            date_format($time, 'Y') . "_product_price." . $file->getClientOriginalExtension();

        $file->move(TEMP_PATH, $file_name);
        return $file_name;
    }
}
