<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Modules\Frontend\Http\Requests\ContactRequest;
use Modules\Frontend\Repositories\Agency\AgencyRepositoryInterface;
use Modules\Frontend\Repositories\Contact\ContactRepositoryInterface;
use Modules\Frontend\Repositories\Page\PageRepositoryInterface;
use Modules\Frontend\Repositories\PageMap\PageMapRepositoryInterface;

class IndexController extends BaseController
{
    protected $repoPageMap;
    protected $repoPage;
    protected $repoAgency;
    protected $contact;

    public function __construct(
        PageMapRepositoryInterface $repoPageMap,
        PageRepositoryInterface $repoPage,
        AgencyRepositoryInterface $repoAgency,
        ContactRepositoryInterface $contact
    ) {
        $this->repoPageMap = $repoPageMap;
        $this->repoPage = $repoPage;
        $this->repoAgency = $repoAgency;
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $filter = [
            'page_id' => 1,
            'type' => 'product'
        ];
        $filter_solution = [
            'page_id' => 41
        ];
        $arrResult = $this->repoPageMap->getPlugins($filter_solution);
        $arrProduct = $this->repoPageMap->getPluginsProduct($filter);
        $arrPage = $this->repoPage->getCurrentPage($filter);
        $arrAgency = $this->repoAgency->getListAll();
        //dd($arrResult);
        return view('frontend::index.index', [
            'data' => $arrResult,
            'product' => $arrProduct,
            'page'  => $arrPage,
            'listAgency' => $arrAgency,
        ]);
    }

    public function changeLocale(Request $request, $locale)
    {
        if (!in_array($locale, Config::get('app.locales'))) {
            return redirect()->route(getValueByLang('frontend.home_', 'vi'));
        }

        $session = $request->session()->get('arrRoute');

        if(!$session[$locale]){
            return redirect()->route(getValueByLang('frontend.home_', 'vi'));
        }

        return redirect()->to($session[$locale]);
    }

    public function submitContact(ContactRequest $request)
    {
        $data = $request->all();

        $result = $this->contact->add($data);

        if ($result['error']) {
            return back()->with('failed', __('Thông tin của bạn gửi thất bại.'));
        }

        return back()->with('success', __('Thông tin của bạn đã được gửi.'));
    }

    public function sitemap(){
        return 'dmm';
    }
}
