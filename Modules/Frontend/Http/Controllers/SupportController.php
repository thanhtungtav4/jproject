<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Frontend\Repositories\Faq\FaqRepositoryInterface;
use Modules\Frontend\Repositories\Page\PageRepositoryInterface;
use Modules\Frontend\Repositories\PageMap\PageMapRepositoryInterface;
use Modules\Frontend\Repositories\Support\SupportRepositoryInterface;

class SupportController extends Controller
{
    protected $repoFaq;
    protected $repoSupport;
    protected $repoPageMap;
    protected $repoPage;

    public function __construct(
        PageMapRepositoryInterface $repoPageMap,
        PageRepositoryInterface $repoPage,
        FaqRepositoryInterface $repoFaq,
        SupportRepositoryInterface $repoSupport
    ) {
        $this->repoPageMap = $repoPageMap;
        $this->repoPage = $repoPage;
        $this->repoFaq = $repoFaq;
        $this->repoSupport = $repoSupport;
    }

    public function index()
    {
        $filter = [
            'page_id' => 25
        ];
        $arrResult = $this->repoPageMap->getPlugins($filter);
        $arrPage = $this->repoPage->getCurrentPage($filter);
        $arrFaq = $this->repoFaq->getListAll();
        $arrSupport = $this->repoSupport->getListAll();

        return view('frontend::support.index', [
            'data' => $arrResult,
            'page'  => $arrPage,
            'listFaq' => $arrFaq['data'],
            'listSupport' => $arrSupport,
        ]);
    }

    /**
     * Trang câu hỏi thường gặp
     *
     * @return Response
     */
    public function faq()
    {
        $filter = [
            'page_id' => 26
        ];
        $arrResult = $this->repoPageMap->getPlugins($filter);
        $arrPage = $this->repoPage->getCurrentPage($filter);
        $request = request()->all();
        $arrFaq = $this->repoFaq->getListAll($request);

        return view('frontend::support.faq', [
            'data' => $arrResult,
            'listFaq' => $arrFaq['data'],
            'page'  => $arrPage,
            'filter' => $arrFaq['filter']
        ]);
    }
}
