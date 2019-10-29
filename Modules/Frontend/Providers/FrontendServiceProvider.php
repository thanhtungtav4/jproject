<?php

namespace Modules\Frontend\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Frontend\Models\ConfigTable;
use Modules\Frontend\Models\PageTable;

class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->viewShare();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('frontend.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'frontend'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/frontend');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/frontend';
        }, \Config::get('view.paths')), [$sourcePath]), 'frontend');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/frontend');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'frontend');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'frontend');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    public function viewShare()
    {
        $config = (new ConfigTable)->getListAll()->toArray();
        View::share('dataShareConfig', $this->getListConfig($config));

        $mPage = new PageTable();
        $arrProduct = $mPage->getAllPageProduct();
        $arrSolution = $mPage->getAllPageSolution();
        $arrMenu = [
            'product' => $arrProduct,
            'solution' => $arrSolution
        ];

        View::share('dataShareMenu', $arrMenu);
    }

    /**
     * Lấy danh sách config
     *
     * @param array $config
     * @return array
     */
    private function getListConfig(array $config)
    {
        $list = [];
        if (count($config) > 0) {
            foreach ($config as $item) {
                $list[$item['key']] = [
                    'vi' => $item['value_vi'],
                    'en' => $item['value_en'],
                ];
            }
        }

        return $list;
    }
}
