<?php


namespace Modules\Admin\Http\Controllers;


use Illuminate\Http\Request;
use Modules\Admin\Repositories\Page\PageRepositoryInterface;

class SupportController extends Controller
{
    protected $category;
    protected $page;
    protected $request;
    public function __construct(Request $request ,PageRepositoryInterface $page)
    {
        $this->request = $request;
        $this->page = $page;
    }
    public function index()
    {
        $page_type = 'support';
        $category_id = '6';
        $data = $this->page->getPage($page_type);
        return view('admin::support.support-central', [
            'support' => $data,
            'page_type' => $page_type,
            'category_id' => $category_id
        ]);
    }
}
