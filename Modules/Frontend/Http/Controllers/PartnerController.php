<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Frontend\Repositories\Agency\AgencyRepositoryInterface;
use Modules\Frontend\Repositories\Page\PageRepositoryInterface;
use Modules\Frontend\Repositories\PageMap\PageMapRepositoryInterface;

class PartnerController extends BaseController
{
    protected $repoPageMap;
    protected $repoPage;
    protected $repoAgency;

    public function __construct(
        PageMapRepositoryInterface $repoPageMap,
        PageRepositoryInterface $repoPage,
        AgencyRepositoryInterface $repoAgency
    ) {
        $this->repoPageMap = $repoPageMap;
        $this->repoPage = $repoPage;
        $this->repoAgency = $repoAgency;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $filter = [
            'page_id' => 23
        ];
        $arrResult = $this->repoPageMap->getPlugins($filter);
        $arrPage = $this->repoPage->getCurrentPage($filter);

        return view('frontend::partner.index', [
            'data' => $arrResult,
            'page'  => $arrPage
        ]);
    }

    /**
     * Trang đối tác
     *
     * @return Response
     */
    public function agent()
    {
        $filter = [
            'page_id' => 24
        ];
        $arrResult = $this->repoPageMap->getPlugins($filter);
        $arrPage = $this->repoPage->getCurrentPage($filter);
        $arrAgency = $this->repoAgency->getListAll();

        return view('frontend::partner.agent', [
            'data' => $arrResult,
            'listAgency' => $arrAgency,
            'page'  => $arrPage
        ]);
    }
}
