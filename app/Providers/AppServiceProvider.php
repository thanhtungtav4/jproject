<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Models\AdminMenuCategoryTable;
use Modules\Core\Models\AdminMenuTable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $adminMenu = new AdminMenuTable();
        $adminMenuCategory = new AdminMenuCategoryTable;
        $listMenu = $adminMenu->getListAll(['menu_category_id' => 0]);
        $listMenuCategory = $adminMenuCategory->with(['child' => function ($q) {
            $q->where('is_actived', 1)->orderBy('menu_position', 'asc');
        }])
            ->orderBy('menu_category_position', 'asc')
            ->get()
            ->toArray();
        View::share('dataShare', [
            'menu' => $listMenu,
            'menu_category' => $listMenuCategory,
        ]);
    }
}
