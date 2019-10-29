<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'middleware' => ['web'],
        'prefix' => 'admin',
    ],
    function () {
        Route::get('/', function () {
            return redirect()->route(LOGIN_HOME_PAGE);
        });
        Route::group(['middleware' => ['auth', 'permission']],
            function () {
                Route::group(['prefix' => 'manager-page'], function () {
                    Route::get('/page-home', 'PageHomeController@index')->name('admin.page-home');
//                    Route::get('/about-us', 'AboutUsController@index')->name('admin.about-us');
                    Route::get('/partner', 'PartnerController@index')->name('admin.partner');
                    Route::get('/support-central', 'SupportController@index')->name('admin.support.central');
                    Route::get('/product-category', 'ProductController@listCategoryProduct')
                        ->name('admin.product.category');
                    Route::get('/product', 'ProductController@listProduct')->name('admin.product.product');
                    Route::get('/solution-category', 'SolutionController@listCategorySolution')
                        ->name('admin.solution.category');
                    Route::get('/solution', 'SolutionController@listSolution')->name('admin.solution.solution');
                    Route::get('/product-block/{page_alias_vi}', 'ProductController@blockProduct')
                        ->name('admin.product.product.block');
                    Route::get('/solution-block/{page_alias_vi}', 'SolutionController@blockSolution')
                        ->name('admin.solution.solution.block');
                    Route::get('/page/create', 'PageController@createPage')->name('admin.page.create');
                    Route::get('/page/edit/{category}/{id}', 'PageController@editPage')->name('admin.page.edit');
                    Route::get('/create-category', 'CategoryController@create')->name('admin.category.create');
                    Route::get('/edit-category/{id}', 'CategoryController@edit')->name('admin.category.edit');
            //        Route::get('/about-us/{page_alias}', 'AboutUsController@detail')->name('admin.about-us.detail');
                    Route::get('/about-us/company', 'AboutUsController@detailcompany')
                        ->name('admin.about-us.detail.tpcloud');
                    Route::get('/about-us/our-technology', 'AboutUsController@detailOurTechnology')
                        ->name('admin.about-us.detail.our-technology');
            //        Route::get('/partner/{page_alias}', 'PartnerController@detail')->name('admin.partner.detail');
                    Route::get('/partner/partner', 'PartnerController@detailPartner')
                        ->name('admin.partner.detail.partner');
                    Route::get('/partner/tpcloud', 'PartnerController@detailTpcloud')
                        ->name('admin.partner.detail.tpcloud');
                    Route::get('/list-map', 'MapController@index')->name('admin.map');
                    Route::get('/create-plugin', 'PluginController@create')->name('admin.plugin.create');
                    Route::get('/update-plugin/{plugin_id}', 'PluginController@editPlugin')
                        ->name('admin.plugin.update');
                    Route::get('/create-product-price', 'ProductController@createProductPrice')
                        ->name('admin.product.product-price.create');
                    Route::get('/edit-product-price/{id}', 'ProductController@editProductPrice')
                        ->name('admin.product.product-price.edit');
                    /** manager solution home page**/
                    Route::get('/list-solution', 'SolutionController@index')->name('admin.page-home.solution');
                    Route::get('/create-plugin-solution', 'PluginController@create_solution')->name('admin.plugin.create_solution');
                    /** manager company */

                });

                Route::group(['prefix' => 'manager-page-post'], function () {
                    Route::post('/page/edit', 'PageController@editPagePost')->name('admin.page.edit.post');
                    Route::post('/page/create-post', 'PageController@createPagePost')->name('admin.page.create.post');
                    Route::post('/page/delete-post', 'PageController@deletePagePost')->name('admin.page.delete.post');
                    Route::post('/edit-category', 'CategoryController@editCategory')->name('admin.category.edit.post');
                    Route::post('/create-category-post', 'CategoryController@createCategory')
                        ->name('admin.category.create.post');
                    Route::post('/delete-category', 'CategoryController@deleteCategory')
                        ->name('admin.category.delete');
                    Route::post('/create-plugin-post', 'PluginController@createPlugin')
                        ->name('admin.plugin.create.post');
                    Route::post('/update-plugin', 'PluginController@updatePlugin')->name('admin.plugin.update.post');
                    Route::post('/delete-plugin', 'PluginController@deletePlugin')->name('admin.plugin.delete.post');
                    Route::post('/list-map/add', 'MapController@add')->name('admin.map.add');
                    Route::post('/list-map/delete', 'MapController@delete')->name('admin.map.delete');
                    Route::post('/upload-image', 'PluginController@uploadImage')->name('admin.plugin.upload.image');
                    Route::post('/upload-image-page', 'PageController@uploadImage')->name('admin.page.upload.image');
                    Route::post('/upload-image-product-price', 'ProductController@uploadImage')
                        ->name('admin.product.product-price.upload.image');
                    Route::post('/upload-background-page', 'PageController@uploadBackground')
                        ->name('admin.page.upload.background');
                    Route::post('/change-status', 'PluginController@changeStatus')
                        ->name('admin.plugin.changeStatus.post');
                    Route::post('/change-status-page', 'PageController@changeStatus')
                        ->name('admin.page.changeStatus.post');
                    Route::post('/create-product-price', 'ProductController@createProductPricePost')
                        ->name('admin.product.product-price.create.post');
                    Route::post('/update-product-price', 'ProductController@updateProductPricePost')
                        ->name('admin.product.product-price.update.post');
                    Route::post('/change-product-price', 'ProductController@changeProductPricePost')
                        ->name('admin.product.product-price.change.post');
                    Route::post('/map/plugin', 'MapController@showPopupAdd')
                        ->name('admin.map.plugin.add');
                });
                Route::group(['prefix' => 'blog-category'], function () {
                    Route::get('/', 'BlogCategoryController@index')->name('admin.blog-category');
                    Route::get('create', 'BlogCategoryController@create')->name('admin.blog-category.create');
                    Route::post('upload', 'BlogCategoryController@uploadAction')->name('admin.blog-category.upload');
                    Route::post('store', 'BlogCategoryController@store')->name('admin.blog-category.store');
                    Route::get('edit/{id}', 'BlogCategoryController@edit')->name('admin.blog-category.edit');
                    Route::post('update', 'BlogCategoryController@update')->name('admin.blog-category.update');
                    Route::post('change-status', 'BlogCategoryController@changeStatusAction')
                        ->name('admin.blog-category.change-status');
                    Route::post('destroy', 'BlogCategoryController@destroy')->name('admin.blog-category.destroy');
                });
                Route::group(['prefix' => 'blog'], function () {
                    Route::get('/', 'BlogController@index')->name('admin.blog');
                    Route::get('create', 'BlogController@create')->name('admin.blog.create');
                    Route::post('upload', 'BlogController@uploadAction')->name('admin.blog.upload');
                    Route::post('store', 'BlogController@store')->name('admin.blog.store');
                    Route::get('edit/{id}', 'BlogController@edit')->name('admin.blog.edit');
                    Route::post('update', 'BlogController@update')->name('admin.blog.update');
                    Route::post('destroy', 'BlogController@destroy')->name('admin.blog.destroy');
                });
                /**
                    Contact manager
                 **/
                Route::group(['prefix' => 'contact'], function () {
                    Route::get('/', 'ContactController@index')->name('admin.contact');
                    Route::get('detail/{id}', 'ContactController@show')->name('admin.contact.show');
                });
                /**
                    !Contact manager
                 **/
                Route::group(['prefix' => 'agency'], function () {
                    Route::get('/', 'AgencyController@index')->name('admin.agency');
                    Route::get('create', 'AgencyController@create')->name('admin.agency.create');
                    Route::post('store', 'AgencyController@store')->name('admin.agency.store');
                    Route::post('upload', 'AgencyController@uploadAction')->name('admin.agency.upload');
                    Route::get('edit/{id}', 'AgencyController@edit')->name('admin.agency.edit');
                    Route::post('update', 'AgencyController@update')->name('admin.agency.update');
                    Route::post('change-status', 'AgencyController@changeStatusAction')
                        ->name('admin.agency.change-status');
                    Route::post('destroy', 'AgencyController@destroy')->name('admin.agency.destroy');
                });
                Route::group(['prefix' => 'faq'], function () {
                    Route::get('/', 'FaqController@index')->name('admin.faq');
                    Route::get('create', 'FaqController@create')->name('admin.faq.create');
                    Route::post('store', 'FaqController@store')->name('admin.faq.store');
                    Route::get('edit/{id}', 'FaqController@edit')->name('admin.faq.edit');
                    Route::post('update', 'FaqController@update')->name('admin.faq.update');
                    Route::post('change-status', 'FaqController@changeStatusAction')->name('admin.faq.change-status');
                    Route::post('destroy', 'FaqController@destroy')->name('admin.faq.destroy');
                });
                Route::group(['prefix' => 'config'], function () {
                    Route::get('/', 'ConfigController@index')->name('admin.config');
                    Route::get('edit/{id}', 'ConfigController@edit')->name('admin.config.edit');
                    Route::post('update', 'ConfigController@update')->name('admin.config.update');
                    Route::post('upload', 'ConfigController@uploadAction')->name('admin.config.upload');
                });
                Route::group(['prefix' => 'support'], function () {
                    Route::get('/', 'SupportCentralController@index')->name('admin.support');
                    Route::get('create', 'SupportCentralController@create')->name('admin.support.create');
                    Route::post('store', 'SupportCentralController@store')->name('admin.support.store');
                    Route::post('upload', 'SupportCentralController@uploadAction')->name('admin.support.upload');
                    Route::get('edit/{id}', 'SupportCentralController@edit')->name('admin.support.edit');
                    Route::post('update', 'SupportCentralController@update')->name('admin.support.update');
                    Route::post('change-status', 'SupportCentralController@changeStatusAction')
                        ->name('admin.support.change-status');
                    Route::post('destroy', 'SupportCentralController@destroy')->name('admin.support.destroy');
                });
                Route::get('validation', function () {
                    return trans('admin::validation');
                })->name('admin.validation');
            }
        );
    }
);
