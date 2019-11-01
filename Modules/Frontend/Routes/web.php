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
Route::get('locale/{locale}', 'IndexController@changeLocale')->name('frontend.index.change-locale');
Route::group(['middleware' => ['locale']], function () {
 Route::get('/', 'IndexController@index');
    Route::group(['prefix' => 'vi', 'lang' => 'vi'], function () {
        Route::get('/index', 'IndexController@index')->name('frontend.home_vi');
        Route::post('/index', 'IndexController@submitContact')->name('frontend.home_vi');
        // Giới thiệu
        Route::get('gioi-thieu', 'AboutUsController@index')->name('frontend.about_vi');
        // Company
        Route::get('ve-chung-toi', 'AboutUsController@company')->name('frontend.company_vi');
        // !Company
        // Business outline
        Route::get('doanh-nghịep', 'AboutUsController@business')->name('frontend.business_vi');
        // !Business outline
        // solution-cat
        Route::get('nhom-giai-phap', 'AboutUsController@solution_cat')->name('frontend.solution-cat_vi');
        // !solution-cat
        // solution
        Route::get('giai-phap', 'AboutUsController@solution')->name('frontend.solution_vi');
        // !solution
        // maintenance
        Route::get('bao-tri', 'AboutUsController@maintenance')->name('frontend.maintenance_vi');
        // !maintenance
        // works
        Route::get('du-an', 'AboutUsController@works')->name('frontend.works_vi');
        // !works
        //Liên hệ
        Route::get('lien-he-chung-toi', 'AboutUsController@contact')->name('frontend.about.contact_vi');
        Route::post('lien-he-chung-toi', 'AboutUsController@submitContact')->name('frontend.about.contact_vi');

        //submit contact vi
//        Route::get('/san-pham/{product}', 'ProductController@index')->name('frontend.product.detail_vi');
//        Route::get('/giai-phap/{solution}', 'SolutionController@index')->name('frontend.solution.detail_vi');
        // Công nghệ của chúng tôi
//        Route::get('cong-nghe-cua-chung-toi', 'AboutUsController@ourTechnology')
//            ->name('frontend.about.our_technology_vi');
        // Tin tức
//        Route::get('tin-tuc', 'AboutUsController@news')->name('frontend.about.news_vi');
//        Route::get('tin-tuc/{alias}', 'AboutUsController@newsDetail')->name('frontend.about.news_detail_vi');
//        Route::get('tin-tuc/danh-muc/{alias}', 'AboutUsController@newsCategory')
//            ->name('frontend.about.news_category_vi');
        // Partner
//        Route::get('doi-tac', 'PartnerController@index')->name('frontend.partner_vi');
//        Route::get('dai-ly-tpcloud', 'PartnerController@agent')->name('frontend.partner.agent_vi');
        //Support
//        Route::get('trung-tam-ho-tro', 'SupportController@index')->name('frontend.support_vi');
//        Route::get('cau-hoi-thuong-gap', 'SupportController@faq')->name('frontend.support.faq_vi');
    });

    Route::group(['prefix' => 'en', 'lang' => 'en'], function () {
        Route::get('/index', 'IndexController@index')->name('frontend.home_en');
        Route::post('/index', 'IndexController@submitContact')->name('frontend.home_en');
        // Giới thiệu
        Route::get('about-us', 'AboutUsController@index')->name('frontend.about_en');
        // Company
        Route::get('company', 'AboutUsController@company')->name('frontend.company_en');
        // !Company
        // Business outline
        Route::get('business', 'AboutUsController@business')->name('frontend.business_en');
        // !Business outline
        // solution-cat
        Route::get('solution-cat', 'AboutUsController@solution_cat')->name('frontend.solution-cat_en');
        // !solution-cat
        // solution
        Route::get('solution', 'AboutUsController@solution')->name('frontend.solution_en');
        // !solution
        // maintenance
        Route::get('maintenance', 'AboutUsController@maintenance')->name('frontend.maintenance_en');
        // !maintenance
        // works
        Route::get('works', 'AboutUsController@works')->name('frontend.works_en');
        // !works
        //Liên hệ
        Route::get('contact-us', 'AboutUsController@contact')->name('frontend.about.contact_en');
        Route::post('contact-us', 'AboutUsController@submitContact')->name('frontend.about.contact_en');

        // Công nghệ của chúng tôi
//        Route::get('our-technology', 'AboutUsController@ourTechnology')
//            ->name('frontend.about.our_technology_en');
        // Tin tức
//        Route::get('news', 'AboutUsController@news')->name('frontend.about.news_en');
//        Route::get('news/{alias}', 'AboutUsController@newsDetail')->name('frontend.about.news_detail_en');
//        Route::get('news/category/{alias}', 'AboutUsController@newsCategory')->name('frontend.about.news_category_en');
//        Route::get('/product/{product}', 'ProductController@index')->name('frontend.product.detail_en');
//        Route::get('/solution/{solution}', 'SolutionController@index')->name('frontend.solution.detail_en');
        // Partner
//        Route::get('partner', 'PartnerController@index')->name('frontend.partner_en');
//        Route::get('agent-tpcloud', 'PartnerController@agent')->name('frontend.partner.agent_en');
        // Support
//        Route::get('support-central', 'SupportController@index')->name('frontend.support_en');
//        Route::get('faq', 'SupportController@faq')->name('frontend.support.faq_en');
    });
});

Route::get('/sitemap.xml', 'IndexController@sitemap')->name('sitemap');
