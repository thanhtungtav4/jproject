<?php


namespace Modules\Admin\Http\Controllers;


use Illuminate\Http\Request;
use Modules\Admin\Repositories\Page\PageRepositoryInterface;

class PartnerController extends Controller
{
    protected $page;
    protected $request;
    public function __construct(PageRepositoryInterface $page, Request $request)
    {
        $this->page = $page;
        $this->request = $request;
    }

    public function index()
    {
        return view('admin::partner.index', [
        ]);
    }

//    public function detail()
//    {
//        $param = $this->request->route('page_alias');
////        $id = $this->page->getIdPage('about-us', $param);
//        $doitac = 23;
//        $daily_tpcloud = 24;
//        if ($param == 'doi-tac-cua-chung-toi') {
//            return view('admin::partner.list-block-partner', [
//                'page_id' => $doitac
//            ]);
//        } else {
//            return view('admin::partner.list-block-daily-tpcloud', [
//                'page_id' => $daily_tpcloud
//            ]);
//        }
//    }

    public function detailPartner()
    {
        $doitac = 23;
        $category = 5;
        $page = 'partner';
        $titlePage = $this->page->getPageDetail($doitac);
        return view('admin::partner.list-block-partner', [
            'page_id' => $doitac,
            'category' => $category,
            'page' => $page,
            'titlePage' => $titlePage['page_title_vi']
        ]);
    }

    public function detailTpcloud()
    {
        $daily_tpcloud = 24;
        $category = 5;
        $page = 'partner';
        $titlePage = $this->page->getPageDetail($daily_tpcloud);
        return view('admin::partner.list-block-daily-tpcloud', [
            'page_id' => $daily_tpcloud,
            'category' => $category,
            'page' => $page,
            'titlePage' => $titlePage['page_title_vi']
        ]);
    }
}
