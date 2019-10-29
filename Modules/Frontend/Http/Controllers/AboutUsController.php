<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Modules\Frontend\Http\Requests\ContactRequest;
use Modules\Frontend\Repositories\Blog\BlogRepositoryInterface;
use Modules\Frontend\Repositories\BlogCategory\BlogCategoryRepositoryInterface;
use Modules\Frontend\Repositories\Contact\ContactRepositoryInterface;
use Modules\Frontend\Repositories\Page\PageRepositoryInterface;
use Modules\Frontend\Repositories\PageMap\PageMapRepositoryInterface;

class AboutUsController extends BaseController
{
    protected $repoPageMap;
    protected $repoPage;
    protected $repoBlog;
    protected $repoBlogCategory;
    protected $contact;

    public function __construct(
        PageMapRepositoryInterface $repoPageMap,
        PageRepositoryInterface $repoPage,
        BlogRepositoryInterface $repoBlog,
        BlogCategoryRepositoryInterface $repoBlogCategory,
        ContactRepositoryInterface $contact
    ) {
        $this->repoPageMap = $repoPageMap;
        $this->repoPage = $repoPage;
        $this->repoBlog = $repoBlog;
        $this->repoBlogCategory = $repoBlogCategory;
        $this->contact = $contact;
    }

    /**
     * Trang TPCloud
     *
     * @return Response
     */
    public function index()
    {
        $filter = [
            'page_id' => 2
        ];
        $arrResult = $this->repoPageMap->getPlugins($filter);
        $arrPage = $this->repoPage->getCurrentPage($filter);

        return view('frontend::about-us.index', [
            'data' => $arrResult,
            'page'  => $arrPage
        ]);
    }

    /**
     * Trang tin tức
     *
     * @return Response
     */
    public function news()
    {
        $pageId = [
            'page_id' => 3
        ];
        $filter = request()->all();
        $arrPage = $this->repoPage->getCurrentPage($pageId);
        $listNews = $this->repoBlog->getList($filter);
        $listNewsCategory = $this->repoBlogCategory->getListAll();
        return view('frontend::about-us.news', [
            'list' => $listNews,
            'listCategory' => $listNewsCategory,
            'page' => $arrPage,
            'filter' => $filter,
        ]);
    }

    /**
     * Trang chi tiết tin tức
     *
     * @param string $alias
     * @return Response
     */
    public function newsDetail($alias)
    {
        $currentLang = App::getLocale();
        $detail = $this->repoBlog->getDetail($alias, $currentLang);
        $referent = null;

        if ($detail) {
            $condition = [
                ['tpcloud_cms_blog.category_id', '=', $detail['category_id']]
            ];
            $referent = $this->repoBlog->getReferent($condition, $detail['id']);
        }

        return view('frontend::about-us.news-detail', [
            'detail' => $detail,
            'referent' => $referent
        ]);
    }

    /**
     * Trang tin tức lọc theo danh mục
     *
     * @param string $alias
     * @return Response
     */
    public function newsCategory($alias)
    {
        $pageId = [
            'page_id' => 3
        ];
        $filter = request()->all();
        $arrPage = $this->repoPage->getCurrentPage($pageId);
        $filter['blog_cat$'.getValueByLang('alias_')] = $alias;
        $listNews = $this->repoBlog->getList($filter);
        $listNewsCategory = $this->repoBlogCategory->getListAll();
        return view('frontend::about-us.news', [
            'list' => $listNews,
            'listCategory' => $listNewsCategory,
            'page' => $arrPage,
            'filter' => $filter,
        ]);
    }

    /**
     * Trang công nghệ của chúng tôi
     *
     * @return Response
     */
    public function ourTechnology()
    {
        $filter = [
            'page_id' => 4
        ];
        $arrPage = $this->repoPage->getCurrentPage($filter);
        $arrResult = $this->repoPageMap->getPlugins($filter);

        return view('frontend::about-us.our-technology', [
            'data' => $arrResult,
            'page'  => $arrPage
        ]);
    }

    /**
     * Trang liên hệ chúng tôi
     *
     * @return Response
     */
    public function contact()
    {
        $filter = [
            'page_id' => 5
        ];
        $arrPage = $this->repoPage->getCurrentPage($filter);

        return view('frontend::about-us.contact', [
            'page'  => $arrPage
        ]);
    }
    /**
     * Trang Corporate Profile / về
     *
     * @return Response
     */
    public function company()
    {
        $filter = [
            'page_id' => 2
        ];
        $arrPage = $this->repoPage->getCurrentPage($filter);

        return view('frontend::company.profile', [
            'page'  => $arrPage
        ]);
    }
    /**
     * Trang Corporate Profile / về
     *
     * @return Response
     */
    public function business()
    {
        $filter = [
            'page_id' => 3
        ];
        $arrPage = $this->repoPage->getCurrentPage($filter);

        return view('frontend::company.business', [
            'page'  => $arrPage
        ]);
    }
    /**
     * Xử lý gửi liên hệ
     *
     * @param ContactRequest $request
     * @return Response
     */
    public function submitContact(ContactRequest $request)
    {
        $data = $request->all();

        $result = $this->contact->add($data);

        if ($result['error']) {
            return back()->with('failed', __('Thông tin của bạn gửi thất bại.'));
        }

        return back()->with('success', __('Thông tin của bạn đã được gửi.'));
    }
}
