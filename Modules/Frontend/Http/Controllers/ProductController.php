<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Frontend\Repositories\Page\PageRepositoryInterface;
use Modules\Frontend\Repositories\PageMap\PageMapRepositoryInterface;
use Modules\Frontend\Repositories\ProductPrice\ProductPriceRepositoryInterface;

class ProductController extends Controller
{
    protected $repoPageMap;
    protected $repoPage;
    protected $repoProductPrice;

    public function __construct(
        PageMapRepositoryInterface $repoPageMap,
        PageRepositoryInterface $repoPage,
        ProductPriceRepositoryInterface $repoProductPrice
    ) {
        $this->repoPageMap = $repoPageMap;
        $this->repoPage = $repoPage;
        $this->repoProductPrice = $repoProductPrice;
    }

    public function index($product)
    {
        $arrPage = $this->repoPage->getCurrentPageByAlias([
            [getValueByLang('page_alias_'), '=', $product],
            ['page_type', '=', 'product']
        ]);
        $arrResult = $this->repoPageMap->getPlugins([
            'page_id' => $arrPage['page_id']
        ]);
        $arrPrice = $this->repoProductPrice->getListAllByPage($arrPage['page_id']);

        return view('frontend::product.index', [
            'data' => $arrResult,
            'listPrice' => $arrPrice,
            'page'  => $arrPage
        ]);
    }

    /**
     * Lấy page id
     *
     * @param string $product
     * @return int
     */
    private function getPageId($product)
    {
        $pageInfo = $this->repoPage->getCurrentPageByAlias([
            [getValueByLang('page_alias_'), '=', $product]
        ]);

        return $pageInfo['page_id'];
    }
}
