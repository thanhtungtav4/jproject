<?php


namespace Modules\Admin\Providers;


use Illuminate\Support\ServiceProvider;
use Modules\Admin\Repositories\Category\CategoryRepository;
use Modules\Admin\Repositories\Category\CategoryRepositoryInterface;
use Modules\Admin\Repositories\Config\ConfigRepository;
use Modules\Admin\Repositories\Config\ConfigRepositoryInterface;
use Modules\Admin\Repositories\Map\MapCategoryRepository;
use Modules\Admin\Repositories\Map\MapCategoryRepositoryInterface;
use Modules\Admin\Repositories\Page\PageRepository;
use Modules\Admin\Repositories\Page\PageRepositoryInterface;
use Modules\Admin\Repositories\PageSlug\PageSlugRepository;
use Modules\Admin\Repositories\PageSlug\PageSlugRepositoryInterface;
use Modules\Admin\Repositories\Plugin\PluginRepository;
use Modules\Admin\Repositories\Plugin\PluginRepositoryInterface;
use Modules\Admin\Repositories\Agency\AgencyRepository;
use Modules\Admin\Repositories\Agency\AgencyRepositoryInterface;
use Modules\Admin\Repositories\Blog\BlogRepository;
use Modules\Admin\Repositories\Blog\BlogRepositoryInterface;
use Modules\Admin\Repositories\BlogCategory\BlogCategoryRepository;
use Modules\Admin\Repositories\BlogCategory\BlogCategoryRepositoryInterface;
use Modules\Admin\Repositories\Contact\ContactRepository;
use Modules\Admin\Repositories\Contact\ContactRepositoryInterface;
use Modules\Admin\Repositories\Faq\FaqRepository;
use Modules\Admin\Repositories\Faq\FaqRepositoryInterface;
use Modules\Admin\Repositories\ProductPrice\ProductPriceRepository;
use Modules\Admin\Repositories\ProductPrice\ProductPriceRepositoryInterface;
use Modules\Admin\Repositories\Support\SupportRepository;
use Modules\Admin\Repositories\Support\SupportRepositoryInterface;
use Modules\Admin\Repositories\Solution\SolutionRepositoryInterface;
use Modules\Admin\Repositories\Solution\SolutionRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            MapCategoryRepositoryInterface::class,
            MapCategoryRepository::class
        );
        $this->app->singleton(
            PluginRepositoryInterface::class,
            PluginRepository::class
        );
        $this->app->singleton(
            PageRepositoryInterface::class,
            PageRepository::class
        );
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->singleton(
            SolutionRepositoryInterface::class,
            SolutionRepository::class
        );
        $this->app->singleton(MapCategoryRepositoryInterface::class, MapCategoryRepository::class);
        $this->app->singleton(BlogCategoryRepositoryInterface::class, BlogCategoryRepository::class);
        $this->app->singleton(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->singleton(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->singleton(AgencyRepositoryInterface::class, AgencyRepository::class);
        $this->app->singleton(FaqRepositoryInterface::class, FaqRepository::class);
        $this->app->singleton(ConfigRepositoryInterface::class, ConfigRepository::class);
        $this->app->singleton(PageSlugRepositoryInterface::class, PageSlugRepository::class);
        $this->app->singleton(SupportRepositoryInterface::class, SupportRepository::class);
        $this->app->singleton(ProductPriceRepositoryInterface::class,ProductPriceRepository::class);
        $this->app->singleton(SolutionRepositoryInterface::class, SolutionRepository::class);
    }
}
