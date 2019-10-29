<?php


namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Repositories\Page\PageRepositoryInterface;

class AboutUsController extends Controller
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
        return view('admin::about-us.index', [
        ]);
    }

    public function detail()
    {
        $param = $this->request->route('page_alias');
//        $id = $this->page->getIdPage('about-us', $param);
        $tpcloud = 2;
        $our_technology = 4;
        $category = 2;
        $page = 'about-us';
        if ($param == 'tpcloud') {
            return view('admin::about-us.list-block-tpcloud', [
                'page_id' => $tpcloud,
                'category' => $category,
                'page' => $page
            ]);
        } else {
            return view('admin::about-us.list-block-our-technology', [
                'page_id' => $our_technology,
                'category' => $category,
                'page' => $page
            ]);
        }
    }

    public function detailcompany()
    {
        $tpcloud = 2;
        $category = 2;
        $page = 'about-us';
        $titlePage = $this->page->getPageDetail($tpcloud);
        return view('admin::about-us.list-block-tpcloud', [
            'page_id' => $tpcloud,
            'category' => $category,
            'page' => $page,
            'titlePage' => $titlePage['page_title_en']
        ]);

    }

    public function detailOurTechnology()
    {
        $our_technology = 4;
        $category = 2;
        $page = 'about-us';
        $titlePage = $this->page->getPageDetail($our_technology);
        return view('admin::about-us.list-block-our-technology', [
            'page_id' => $our_technology,
            'category' => $category,
            'page' => $page,
            'titlePage' => $titlePage['page_title_vi']
        ]);
    }
}
