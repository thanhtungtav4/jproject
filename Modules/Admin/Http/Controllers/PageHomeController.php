<?php


namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Repositories\Page\PageRepositoryInterface;

class PageHomeController extends Controller
{
    protected $page;
    public function __construct(PageRepositoryInterface $page)
    {
        $this->page = $page;
    }

    public function index()
    {
//        $id = $this->page->getIdPage('home', 'home');
        $page_id = 1;
        $category = 1;
        $page = 'home';
        $page_type = 'product';
        return view('admin::page-home.index', [
            'page_id' => $page_id,
            'page_type' => $page_type,
            'category' => $category,
            'page' => $page,
        ]);
    }
}
