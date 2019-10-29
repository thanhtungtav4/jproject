<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Frontend\Repositories\Page\PageRepositoryInterface;
use Modules\Frontend\Repositories\PageMap\PageMapRepositoryInterface;

class SolutionController extends BaseController
{
    protected $repoPageMap;
    protected $repoPage;

    public function __construct(
        PageMapRepositoryInterface $repoPageMap,
        PageRepositoryInterface $repoPage
    ) {
        $this->repoPageMap = $repoPageMap;
        $this->repoPage = $repoPage;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($solution)
    {
        $arrPage = $this->repoPage->getCurrentPageByAlias([
            [getValueByLang('page_alias_'), '=', $solution],
            ['page_type', '=', 'solution']
        ]);
        $arrResult = $this->repoPageMap->getPlugins([
            'page_id' => $arrPage['page_id']
        ]);
        $arrProduct = $this->repoPageMap->getPluginsProduct([
            'page_id' => $arrPage['page_id'],
            'type' => 'solution',
        ]);

        return view('frontend::solution.index', [
            'data' => $arrResult,
            'page'  => $arrPage,
            'product' => $arrProduct,
        ]);
    }
}
