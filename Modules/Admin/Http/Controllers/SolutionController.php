<?php


namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Repositories\Solution\SolutionRepositoryInterface;

class SolutionController extends Controller
{
    protected $page;
    public function __construct(SolutionRepositoryInterface $page)
    {
        $this->page = $page;
    }

    public function index()
    {
//        $id = $this->page->getIdPage('home', 'home');
        $page_id = 1;
        $category = 1;
        $page = 'solution-list';
        $page_type = 'solution-list';
        return view('admin::solution.index', [
            'page_id' => $page_id,
            'page_type' => $page_type,
            'category' => $category,
            'page' => $page,
            'plugin_type' => 'content-box'
        ]);
//        return view('admin::Solution.index' ,compact('page_id', 'page_type','category', 'page'));
    }
}
