<?php

namespace Modules\Frontend\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Frontend\Repositories\Agency\AgencyRepository;
use Modules\Frontend\Repositories\Agency\AgencyRepositoryInterface;
use Modules\Frontend\Repositories\Blog\BlogRepository;
use Modules\Frontend\Repositories\Blog\BlogRepositoryInterface;
use Modules\Frontend\Repositories\BlogCategory\BlogCategoryRepository;
use Modules\Frontend\Repositories\BlogCategory\BlogCategoryRepositoryInterface;
use Modules\Frontend\Repositories\Contact\ContactRepository;
use Modules\Frontend\Repositories\Contact\ContactRepositoryInterface;
use Modules\Frontend\Repositories\Faq\FaqRepository;
use Modules\Frontend\Repositories\Faq\FaqRepositoryInterface;
use Modules\Frontend\Repositories\Page\PageRepository;
use Modules\Frontend\Repositories\Page\PageRepositoryInterface;
use Modules\Frontend\Repositories\PageMap\PageMapRepository;
use Modules\Frontend\Repositories\PageMap\PageMapRepositoryInterface;
use Modules\Frontend\Repositories\Product\ProductRepository;
use Modules\Frontend\Repositories\Product\ProductRepositoryInterface;
use Modules\Frontend\Repositories\ProductPrice\ProductPriceRepository;
use Modules\Frontend\Repositories\ProductPrice\ProductPriceRepositoryInterface;
use Modules\Frontend\Repositories\Support\SupportRepository;
use Modules\Frontend\Repositories\Support\SupportRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PageMapRepositoryInterface::class, PageMapRepository::class);
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->singleton(PageRepositoryInterface::class, PageRepository::class);
        $this->app->singleton(BlogCategoryRepositoryInterface::class, BlogCategoryRepository::class);
        $this->app->singleton(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->singleton(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->singleton(ProductPriceRepositoryInterface::class, ProductPriceRepository::class);
        $this->app->singleton(AgencyRepositoryInterface::class, AgencyRepository::class);
        $this->app->singleton(FaqRepositoryInterface::class, FaqRepository::class);
        $this->app->singleton(SupportRepositoryInterface::class, SupportRepository::class);
    }
}
