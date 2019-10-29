<?php


namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Repositories\Map\MapCategoryRepositoryInterface;
use Modules\Admin\Repositories\Page\PageRepositoryInterface;
use Modules\Admin\Repositories\ProductPrice\ProductPriceRepositoryInterface;

class MapController extends Controller
{
    protected $request;
    protected $map;
    protected $page;
    protected $productPrice;
    public function __construct(
        Request $request,
        MapCategoryRepositoryInterface $map,
        PageRepositoryInterface $page,
        ProductPriceRepositoryInterface $productPrice
    ) {
        $this->request = $request;
        $this->map = $map;
        $this->page = $page;
        $this->productPrice = $productPrice;
    }

    public function index()
    {
        $param = $this->request->all();
        $namePage = $this->page->getPageDetail($param['page_id']);
        if (isset($param['plugin_type'])) {
            if (isset($param['action'])) {
                $param['type'] = 'plugin';
                $data = $this->map->getListMapPageId($param);
                unset($param['type']);
                $type = 'plugin';
                return view('admin::map.detail-plugin', [
                    'list' => $data,
                    'page_id' => $param['page_id'],
                    'plugin_type' => $param['plugin_type'],
                    'type' => $type,
                    'filter' => $param,
                    'title' => $namePage['page_title_vi']
                ]);
            } else {
                $data = $this->map->getList($param);
                $mapPage = $this->map->getListMapPage($param['page_id']);
                $type = 'plugin';
                return view('admin::map.index', [
                    'list' => $data,
                    'page_id' => $param['page_id'],
                    'plugin_type' => $param['plugin_type'],
                    'map_page' => $mapPage,
                    'type' => $type,
                    'filter' => $param,
                    'title' => $namePage['page_title_vi']
                ]);
            }
        } else {
            if ($param['page_type'] == 'product-price') {
                $list = $this->productPrice->getListProductPrice($param);
                return view('admin::map.page-price', [
                    'list' => $list,
                    'page_id' => $param['page_id'],
                    'page_type' => $param['page_type'],
                    'filter' => $param,
                    'title' => $namePage['page_title_vi']
                ]);
            } else {

//                $data = $this->page->getPage($param['page_type']);
//                $data = $this->page->getPage('product');
                if (isset($param['action'])) {
                    $tmp = 0;
                    if ($param['page_type'] == 'product') {
                        $category_id = 3;
                        $param['type'] = 'product';
                    } elseif ($param['page_type'] == 'solution') {
                        $category_id = 4;
                        $param['page_type'] = 'product';
                        $param['type'] = 'solution';
                    } elseif ($param['page_type'] == 'support') {
                        $category_id = 6;
                    }
                    $data = $this->map->getListMapPageId($param);
                    if ($category_id == 4) {
                        $param['page_type'] = 'solution';
                    }
                    return view('admin::map.detail-page', [
                        'list' => $data,
                        'page_id' => $param['page_id'],
                        'page_type' => $param['page_type'],
                        'category_id' => $category_id,
                        'filter' => $param,
                        'title' => $namePage['page_title_vi']
                    ]);
                } else {
                    $tmp = 0;
                    if ($param['page_type'] == 'product') {
                        $category_id = 3;
                    } elseif ($param['page_type'] == 'solution') {
                        $category_id = 4;
                        $param['page_type'] = 'product';
                    } elseif ($param['page_type'] == 'support') {
                        $category_id = 6;
                    }
                    $data = $this->page->getPage($param);
                    $mapPage = $this->map->getListMapPage($param['page_id']);
                    if ($category_id == 4) {
                        $param['page_type'] = 'solution';
                    }
                    return view('admin::map.page', [
                        'list' => $data,
                        'page_id' => $param['page_id'],
                        'page_type' => $param['page_type'],
                        'map_page' => $mapPage,
                        'category_id' => $category_id,
                        'filter' => $param,
                        'title' => $namePage['page_title_vi']
                    ]);
                }
            }
        }
    }

    public function add()
    {
        $param = $this->request->all();
        $data = $this->map->addPlugin($param);
        return $data;
    }

    public function delete()
    {
        $param = $this->request->all();
        $data = $this->map->deletePlugin($param);
        return $data;
    }

    public function showPopupAdd()
    {
        $param = $this->request->all();
//        return view('admin::map.popup.add', [
//            'page_id' => $param['page_id'],
//            'plugin_id' => $param['plugin_id'],
//            'type' => $param['type'],
//        ]);
        return response()->json(
            view('admin::map.popup.add', [
                    'page_id' => $param['page_id'],
                    'plugin_id' => $param['plugin_id'],
                    'type' => $param['type'],
                    ])
        );
    }
}
