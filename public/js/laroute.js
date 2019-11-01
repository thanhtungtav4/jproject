(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/admin","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/page-home","name":"admin.page-home","action":"Modules\Admin\Http\Controllers\PageHomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/partner","name":"admin.partner","action":"Modules\Admin\Http\Controllers\PartnerController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/support-central","name":"admin.support.central","action":"Modules\Admin\Http\Controllers\SupportController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/product-category","name":"admin.product.category","action":"Modules\Admin\Http\Controllers\ProductController@listCategoryProduct"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/product","name":"admin.product.product","action":"Modules\Admin\Http\Controllers\ProductController@listProduct"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/solution-category","name":"admin.solution.category","action":"Modules\Admin\Http\Controllers\SolutionController@listCategorySolution"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/solution","name":"admin.solution.solution","action":"Modules\Admin\Http\Controllers\SolutionController@listSolution"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/product-block\/{page_alias_vi}","name":"admin.product.product.block","action":"Modules\Admin\Http\Controllers\ProductController@blockProduct"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/solution-block\/{page_alias_vi}","name":"admin.solution.solution.block","action":"Modules\Admin\Http\Controllers\SolutionController@blockSolution"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/page\/create","name":"admin.page.create","action":"Modules\Admin\Http\Controllers\PageController@createPage"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/page\/edit\/{category}\/{id}","name":"admin.page.edit","action":"Modules\Admin\Http\Controllers\PageController@editPage"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/create-category","name":"admin.category.create","action":"Modules\Admin\Http\Controllers\CategoryController@create"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/edit-category\/{id}","name":"admin.category.edit","action":"Modules\Admin\Http\Controllers\CategoryController@edit"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/about-us\/company","name":"admin.about-us.detail.tpcloud","action":"Modules\Admin\Http\Controllers\AboutUsController@detailcompany"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/about-us\/business","name":"admin.about-us.detail.our-technology","action":"Modules\Admin\Http\Controllers\AboutUsController@detailOurTechnology"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/about-us\/solution-list-page","name":"admin.about-us.detail.solution-list-page","action":"Modules\Admin\Http\Controllers\AboutUsController@detailsolotioncate"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/about-us\/works-list-page","name":"admin.about-us.detail.works-list-page","action":"Modules\Admin\Http\Controllers\AboutUsController@detailwork"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/about-us\/maintenance-list-page","name":"admin.about-us.detail.maintenance-list-page","action":"Modules\Admin\Http\Controllers\AboutUsController@detailmaintenance"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/partner\/partner","name":"admin.partner.detail.partner","action":"Modules\Admin\Http\Controllers\PartnerController@detailPartner"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/partner\/tpcloud","name":"admin.partner.detail.tpcloud","action":"Modules\Admin\Http\Controllers\PartnerController@detailTpcloud"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/list-map","name":"admin.map","action":"Modules\Admin\Http\Controllers\MapController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/create-plugin","name":"admin.plugin.create","action":"Modules\Admin\Http\Controllers\PluginController@create"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/update-plugin\/{plugin_id}","name":"admin.plugin.update","action":"Modules\Admin\Http\Controllers\PluginController@editPlugin"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/create-product-price","name":"admin.product.product-price.create","action":"Modules\Admin\Http\Controllers\ProductController@createProductPrice"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/edit-product-price\/{id}","name":"admin.product.product-price.edit","action":"Modules\Admin\Http\Controllers\ProductController@editProductPrice"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/list-solution","name":"admin.page-home.solution","action":"Modules\Admin\Http\Controllers\SolutionController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/manager-page\/create-plugin-solution","name":"admin.plugin.create_solution","action":"Modules\Admin\Http\Controllers\PluginController@create_solution"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/page\/edit","name":"admin.page.edit.post","action":"Modules\Admin\Http\Controllers\PageController@editPagePost"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/page\/create-post","name":"admin.page.create.post","action":"Modules\Admin\Http\Controllers\PageController@createPagePost"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/page\/delete-post","name":"admin.page.delete.post","action":"Modules\Admin\Http\Controllers\PageController@deletePagePost"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/edit-category","name":"admin.category.edit.post","action":"Modules\Admin\Http\Controllers\CategoryController@editCategory"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/create-category-post","name":"admin.category.create.post","action":"Modules\Admin\Http\Controllers\CategoryController@createCategory"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/delete-category","name":"admin.category.delete","action":"Modules\Admin\Http\Controllers\CategoryController@deleteCategory"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/create-plugin-post","name":"admin.plugin.create.post","action":"Modules\Admin\Http\Controllers\PluginController@createPlugin"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/update-plugin","name":"admin.plugin.update.post","action":"Modules\Admin\Http\Controllers\PluginController@updatePlugin"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/delete-plugin","name":"admin.plugin.delete.post","action":"Modules\Admin\Http\Controllers\PluginController@deletePlugin"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/list-map\/add","name":"admin.map.add","action":"Modules\Admin\Http\Controllers\MapController@add"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/list-map\/delete","name":"admin.map.delete","action":"Modules\Admin\Http\Controllers\MapController@delete"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/upload-image","name":"admin.plugin.upload.image","action":"Modules\Admin\Http\Controllers\PluginController@uploadImage"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/upload-image-page","name":"admin.page.upload.image","action":"Modules\Admin\Http\Controllers\PageController@uploadImage"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/upload-image-product-price","name":"admin.product.product-price.upload.image","action":"Modules\Admin\Http\Controllers\ProductController@uploadImage"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/upload-background-page","name":"admin.page.upload.background","action":"Modules\Admin\Http\Controllers\PageController@uploadBackground"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/change-status","name":"admin.plugin.changeStatus.post","action":"Modules\Admin\Http\Controllers\PluginController@changeStatus"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/change-status-page","name":"admin.page.changeStatus.post","action":"Modules\Admin\Http\Controllers\PageController@changeStatus"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/create-product-price","name":"admin.product.product-price.create.post","action":"Modules\Admin\Http\Controllers\ProductController@createProductPricePost"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/update-product-price","name":"admin.product.product-price.update.post","action":"Modules\Admin\Http\Controllers\ProductController@updateProductPricePost"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/change-product-price","name":"admin.product.product-price.change.post","action":"Modules\Admin\Http\Controllers\ProductController@changeProductPricePost"},{"host":null,"methods":["POST"],"uri":"admin\/manager-page-post\/map\/plugin","name":"admin.map.plugin.add","action":"Modules\Admin\Http\Controllers\MapController@showPopupAdd"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/blog-category","name":"admin.blog-category","action":"Modules\Admin\Http\Controllers\BlogCategoryController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/blog-category\/create","name":"admin.blog-category.create","action":"Modules\Admin\Http\Controllers\BlogCategoryController@create"},{"host":null,"methods":["POST"],"uri":"admin\/blog-category\/upload","name":"admin.blog-category.upload","action":"Modules\Admin\Http\Controllers\BlogCategoryController@uploadAction"},{"host":null,"methods":["POST"],"uri":"admin\/blog-category\/store","name":"admin.blog-category.store","action":"Modules\Admin\Http\Controllers\BlogCategoryController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/blog-category\/edit\/{id}","name":"admin.blog-category.edit","action":"Modules\Admin\Http\Controllers\BlogCategoryController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/blog-category\/update","name":"admin.blog-category.update","action":"Modules\Admin\Http\Controllers\BlogCategoryController@update"},{"host":null,"methods":["POST"],"uri":"admin\/blog-category\/change-status","name":"admin.blog-category.change-status","action":"Modules\Admin\Http\Controllers\BlogCategoryController@changeStatusAction"},{"host":null,"methods":["POST"],"uri":"admin\/blog-category\/destroy","name":"admin.blog-category.destroy","action":"Modules\Admin\Http\Controllers\BlogCategoryController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/blog","name":"admin.blog","action":"Modules\Admin\Http\Controllers\BlogController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/blog\/create","name":"admin.blog.create","action":"Modules\Admin\Http\Controllers\BlogController@create"},{"host":null,"methods":["POST"],"uri":"admin\/blog\/upload","name":"admin.blog.upload","action":"Modules\Admin\Http\Controllers\BlogController@uploadAction"},{"host":null,"methods":["POST"],"uri":"admin\/blog\/store","name":"admin.blog.store","action":"Modules\Admin\Http\Controllers\BlogController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/blog\/edit\/{id}","name":"admin.blog.edit","action":"Modules\Admin\Http\Controllers\BlogController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/blog\/update","name":"admin.blog.update","action":"Modules\Admin\Http\Controllers\BlogController@update"},{"host":null,"methods":["POST"],"uri":"admin\/blog\/destroy","name":"admin.blog.destroy","action":"Modules\Admin\Http\Controllers\BlogController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/contact","name":"admin.contact","action":"Modules\Admin\Http\Controllers\ContactController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/contact\/detail\/{id}","name":"admin.contact.show","action":"Modules\Admin\Http\Controllers\ContactController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/agency","name":"admin.agency","action":"Modules\Admin\Http\Controllers\AgencyController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/agency\/create","name":"admin.agency.create","action":"Modules\Admin\Http\Controllers\AgencyController@create"},{"host":null,"methods":["POST"],"uri":"admin\/agency\/store","name":"admin.agency.store","action":"Modules\Admin\Http\Controllers\AgencyController@store"},{"host":null,"methods":["POST"],"uri":"admin\/agency\/upload","name":"admin.agency.upload","action":"Modules\Admin\Http\Controllers\AgencyController@uploadAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/agency\/edit\/{id}","name":"admin.agency.edit","action":"Modules\Admin\Http\Controllers\AgencyController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/agency\/update","name":"admin.agency.update","action":"Modules\Admin\Http\Controllers\AgencyController@update"},{"host":null,"methods":["POST"],"uri":"admin\/agency\/change-status","name":"admin.agency.change-status","action":"Modules\Admin\Http\Controllers\AgencyController@changeStatusAction"},{"host":null,"methods":["POST"],"uri":"admin\/agency\/destroy","name":"admin.agency.destroy","action":"Modules\Admin\Http\Controllers\AgencyController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/faq","name":"admin.faq","action":"Modules\Admin\Http\Controllers\FaqController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/faq\/create","name":"admin.faq.create","action":"Modules\Admin\Http\Controllers\FaqController@create"},{"host":null,"methods":["POST"],"uri":"admin\/faq\/store","name":"admin.faq.store","action":"Modules\Admin\Http\Controllers\FaqController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/faq\/edit\/{id}","name":"admin.faq.edit","action":"Modules\Admin\Http\Controllers\FaqController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/faq\/update","name":"admin.faq.update","action":"Modules\Admin\Http\Controllers\FaqController@update"},{"host":null,"methods":["POST"],"uri":"admin\/faq\/change-status","name":"admin.faq.change-status","action":"Modules\Admin\Http\Controllers\FaqController@changeStatusAction"},{"host":null,"methods":["POST"],"uri":"admin\/faq\/destroy","name":"admin.faq.destroy","action":"Modules\Admin\Http\Controllers\FaqController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/config","name":"admin.config","action":"Modules\Admin\Http\Controllers\ConfigController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/config\/edit\/{id}","name":"admin.config.edit","action":"Modules\Admin\Http\Controllers\ConfigController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/config\/update","name":"admin.config.update","action":"Modules\Admin\Http\Controllers\ConfigController@update"},{"host":null,"methods":["POST"],"uri":"admin\/config\/upload","name":"admin.config.upload","action":"Modules\Admin\Http\Controllers\ConfigController@uploadAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/support","name":"admin.support","action":"Modules\Admin\Http\Controllers\SupportCentralController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/support\/create","name":"admin.support.create","action":"Modules\Admin\Http\Controllers\SupportCentralController@create"},{"host":null,"methods":["POST"],"uri":"admin\/support\/store","name":"admin.support.store","action":"Modules\Admin\Http\Controllers\SupportCentralController@store"},{"host":null,"methods":["POST"],"uri":"admin\/support\/upload","name":"admin.support.upload","action":"Modules\Admin\Http\Controllers\SupportCentralController@uploadAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/support\/edit\/{id}","name":"admin.support.edit","action":"Modules\Admin\Http\Controllers\SupportCentralController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/support\/update","name":"admin.support.update","action":"Modules\Admin\Http\Controllers\SupportCentralController@update"},{"host":null,"methods":["POST"],"uri":"admin\/support\/change-status","name":"admin.support.change-status","action":"Modules\Admin\Http\Controllers\SupportCentralController@changeStatusAction"},{"host":null,"methods":["POST"],"uri":"admin\/support\/destroy","name":"admin.support.destroy","action":"Modules\Admin\Http\Controllers\SupportCentralController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/validation","name":"admin.validation","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/core","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/login","name":"login","action":"Modules\Core\Http\Controllers\LoginController@index"},{"host":null,"methods":["POST"],"uri":"admin\/login","name":"login","action":"Modules\Core\Http\Controllers\LoginController@postLogin"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/logout","name":"logout","action":"Modules\Core\Http\Controllers\LoginController@logout"},{"host":null,"methods":["POST"],"uri":"admin\/send-email-reset-password","name":"user.forget-password.send-email-reset-password","action":"Modules\Core\Http\Controllers\ForgetPasswordController@sendEmailResetPassword"},{"host":null,"methods":["POST"],"uri":"admin\/submit-reset-password","name":"user.forget-password.submit-reset-password","action":"Modules\Core\Http\Controllers\ForgetPasswordController@submitResetPassword"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/forget-password-success","name":"user.forget-password.forget-password-success","action":"Modules\Core\Http\Controllers\ForgetPasswordController@forgetPasswordSuccess"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/reset-password\/{token}","name":"reset-password","action":"Modules\Core\Http\Controllers\ForgetPasswordController@resetPassword"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/error-404","name":"error-404","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/error-403","name":"error-403","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/nothing","name":"nothing","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/validation","name":"core.validation","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-group","name":"core.admin-group.index","action":"Modules\Core\Http\Controllers\AdminGroupController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-group\/create","name":"core.admin-group.create","action":"Modules\Core\Http\Controllers\AdminGroupController@create"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-group\/store","name":"core.admin-group.store","action":"Modules\Core\Http\Controllers\AdminGroupController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-group\/show\/{id}","name":"core.admin-group.show","action":"Modules\Core\Http\Controllers\AdminGroupController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-group\/edit\/{id}","name":"core.admin-group.edit","action":"Modules\Core\Http\Controllers\AdminGroupController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-group\/update","name":"core.admin-group.update","action":"Modules\Core\Http\Controllers\AdminGroupController@update"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-group\/destroy","name":"core.admin-group.destroy","action":"Modules\Core\Http\Controllers\AdminGroupController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-group\/add-user-into-group\/{group_id}","name":"core.admin-group.add-user-into-group","action":"Modules\Core\Http\Controllers\AdminGroupController@addUserIntoGroup"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-group\/submit-add-user-into-group","name":"core.admin-group.submit-add-user-into-group","action":"Modules\Core\Http\Controllers\AdminGroupController@submitAddUserIntoGroup"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-group\/get-list-child","name":"core.admin-group.get-list-child","action":"Modules\Core\Http\Controllers\AdminGroupController@getListGroupChild"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-group\/add-collection-list-child","name":"core.admin-group.add-collection-list-child","action":"Modules\Core\Http\Controllers\AdminGroupController@addCollectionListGroupChild"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-group\/get-list-user","name":"core.admin-group.get-list-user","action":"Modules\Core\Http\Controllers\AdminGroupController@getListUser"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-group\/add-collection-list-user","name":"core.admin-group.add-collection-list-user","action":"Modules\Core\Http\Controllers\AdminGroupController@addCollectionListUser"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-group\/get-list-menu","name":"core.admin-group.get-list-menu","action":"Modules\Core\Http\Controllers\AdminGroupController@getListMenu"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-group\/add-collection-list-menu","name":"core.admin-group.add-collection-list-menu","action":"Modules\Core\Http\Controllers\AdminGroupController@addCollectionListMenu"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-group\/get-list-action","name":"core.admin-group.get-list-action","action":"Modules\Core\Http\Controllers\AdminGroupController@getListAction"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-group\/add-collection-list-action","name":"core.admin-group.add-collection-list-action","action":"Modules\Core\Http\Controllers\AdminGroupController@addCollectionListAction"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-menu","name":"core.admin-menu.index","action":"Modules\Core\Http\Controllers\AdminMenuController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-menu\/create","name":"core.admin-menu.create","action":"Modules\Core\Http\Controllers\AdminMenuController@create"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-menu\/store","name":"core.admin-menu.store","action":"Modules\Core\Http\Controllers\AdminMenuController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-menu\/edit\/{id}","name":"core.admin-menu.edit","action":"Modules\Core\Http\Controllers\AdminMenuController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-menu\/update","name":"core.admin-menu.update","action":"Modules\Core\Http\Controllers\AdminMenuController@update"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-menu\/destroy","name":"core.admin-menu.destroy","action":"Modules\Core\Http\Controllers\AdminMenuController@destroy"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-menu\/get-list-group","name":"core.admin-menu.get-list-group","action":"Modules\Core\Http\Controllers\AdminMenuController@getListGroup"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-menu\/add-collection-list","name":"core.admin-menu.add-collection-list","action":"Modules\Core\Http\Controllers\AdminMenuController@addCollectionList"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-menu\/show\/{id}","name":"core.admin-menu.show","action":"Modules\Core\Http\Controllers\AdminMenuController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-action","name":"core.admin-action.index","action":"Modules\Core\Http\Controllers\AdminActionController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-action\/edit\/{id}","name":"core.admin-action.edit","action":"Modules\Core\Http\Controllers\AdminActionController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-action\/update","name":"core.admin-action.update","action":"Modules\Core\Http\Controllers\AdminActionController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-action\/show\/{id}","name":"core.admin-action.show","action":"Modules\Core\Http\Controllers\AdminActionController@show"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-action\/get-list-group","name":"core.admin-action.get-list-group","action":"Modules\Core\Http\Controllers\AdminActionController@getListGroup"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-action\/add-collection-list-group","name":"core.admin-action.add-collection-list-group","action":"Modules\Core\Http\Controllers\AdminActionController@addCollectionListGroup"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-menu-category","name":"core.admin-menu-category.index","action":"Modules\Core\Http\Controllers\AdminMenuCategoryController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-menu-category\/create","name":"core.admin-menu-category.create","action":"Modules\Core\Http\Controllers\AdminMenuCategoryController@create"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-menu-category\/store","name":"core.admin-menu-category.store","action":"Modules\Core\Http\Controllers\AdminMenuCategoryController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-menu-category\/show\/{id}","name":"core.admin-menu-category.show","action":"Modules\Core\Http\Controllers\AdminMenuCategoryController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/admin-menu-category\/edit\/{id}","name":"core.admin-menu-category.edit","action":"Modules\Core\Http\Controllers\AdminMenuCategoryController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-menu-category\/update","name":"core.admin-menu-category.update","action":"Modules\Core\Http\Controllers\AdminMenuCategoryController@update"},{"host":null,"methods":["POST"],"uri":"admin\/core\/admin-menu-category\/destroy","name":"core.admin-menu-category.destroy","action":"Modules\Core\Http\Controllers\AdminMenuCategoryController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/user","name":"core.user.index","action":"Modules\Core\Http\Controllers\AdminController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/user\/create","name":"core.user.create","action":"Modules\Core\Http\Controllers\AdminController@create"},{"host":null,"methods":["POST"],"uri":"admin\/core\/user\/store","name":"core.user.store","action":"Modules\Core\Http\Controllers\AdminController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/user\/show\/{id}","name":"core.user.show","action":"Modules\Core\Http\Controllers\AdminController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/user\/edit\/{id}","name":"core.user.edit","action":"Modules\Core\Http\Controllers\AdminController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/core\/user\/update","name":"core.user.update","action":"Modules\Core\Http\Controllers\AdminController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/core\/user\/destroy\/{id}","name":"core.user.destroy","action":"Modules\Core\Http\Controllers\AdminController@destroy"},{"host":null,"methods":["POST"],"uri":"admin\/core\/user\/change-status","name":"core.user.change-status","action":"Modules\Core\Http\Controllers\AdminController@changeStatusMyStoreUserAction"},{"host":null,"methods":["POST"],"uri":"admin\/core\/user\/show-reset-password","name":"core.user.show-reset-password","action":"Modules\Core\Http\Controllers\AdminController@showResetPassword"},{"host":null,"methods":["POST"],"uri":"admin\/core\/user\/update-password","name":"core.user.update-password","action":"Modules\Core\Http\Controllers\AdminController@updatePassword"},{"host":null,"methods":["POST"],"uri":"admin\/core\/user\/get-list-child","name":"core.user.get-list-child","action":"Modules\Core\Http\Controllers\AdminController@getListGroupChild"},{"host":null,"methods":["POST"],"uri":"admin\/core\/user\/add-collection-list-child","name":"core.user.add-collection-list-child","action":"Modules\Core\Http\Controllers\AdminController@addCollectionListGroupChild"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/frontend","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"locale\/{locale}","name":"frontend.index.change-locale","action":"Modules\Frontend\Http\Controllers\IndexController@changeLocale"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":null,"action":"Modules\Frontend\Http\Controllers\IndexController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"vi\/index","name":"frontend.home_vi","action":"Modules\Frontend\Http\Controllers\IndexController@index"},{"host":null,"methods":["POST"],"uri":"vi\/index","name":"frontend.home_vi","action":"Modules\Frontend\Http\Controllers\IndexController@submitContact"},{"host":null,"methods":["GET","HEAD"],"uri":"vi\/gioi-thieu","name":"frontend.about_vi","action":"Modules\Frontend\Http\Controllers\AboutUsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"vi\/ve-chung-toi","name":"frontend.company_vi","action":"Modules\Frontend\Http\Controllers\AboutUsController@company"},{"host":null,"methods":["GET","HEAD"],"uri":"vi\/doanh-ngh\u1ecbep","name":"frontend.business_vi","action":"Modules\Frontend\Http\Controllers\AboutUsController@business"},{"host":null,"methods":["GET","HEAD"],"uri":"vi\/nhom-giai-phap","name":"frontend.solution-cat_vi","action":"Modules\Frontend\Http\Controllers\AboutUsController@solution_cat"},{"host":null,"methods":["GET","HEAD"],"uri":"vi\/giai-phap","name":"frontend.solution_vi","action":"Modules\Frontend\Http\Controllers\AboutUsController@solution"},{"host":null,"methods":["GET","HEAD"],"uri":"vi\/bao-tri","name":"frontend.maintenance_vi","action":"Modules\Frontend\Http\Controllers\AboutUsController@maintenance"},{"host":null,"methods":["GET","HEAD"],"uri":"vi\/du-an","name":"frontend.works_vi","action":"Modules\Frontend\Http\Controllers\AboutUsController@works"},{"host":null,"methods":["GET","HEAD"],"uri":"vi\/lien-he-chung-toi","name":"frontend.about.contact_vi","action":"Modules\Frontend\Http\Controllers\AboutUsController@contact"},{"host":null,"methods":["POST"],"uri":"vi\/lien-he-chung-toi","name":"frontend.about.contact_vi","action":"Modules\Frontend\Http\Controllers\AboutUsController@submitContact"},{"host":null,"methods":["GET","HEAD"],"uri":"en\/index","name":"frontend.home_en","action":"Modules\Frontend\Http\Controllers\IndexController@index"},{"host":null,"methods":["POST"],"uri":"en\/index","name":"frontend.home_en","action":"Modules\Frontend\Http\Controllers\IndexController@submitContact"},{"host":null,"methods":["GET","HEAD"],"uri":"en\/about-us","name":"frontend.about_en","action":"Modules\Frontend\Http\Controllers\AboutUsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"en\/company","name":"frontend.company_en","action":"Modules\Frontend\Http\Controllers\AboutUsController@company"},{"host":null,"methods":["GET","HEAD"],"uri":"en\/business","name":"frontend.business_en","action":"Modules\Frontend\Http\Controllers\AboutUsController@business"},{"host":null,"methods":["GET","HEAD"],"uri":"en\/solution-cat","name":"frontend.solution-cat_en","action":"Modules\Frontend\Http\Controllers\AboutUsController@solution_cat"},{"host":null,"methods":["GET","HEAD"],"uri":"en\/solution","name":"frontend.solution_en","action":"Modules\Frontend\Http\Controllers\AboutUsController@solution"},{"host":null,"methods":["GET","HEAD"],"uri":"en\/maintenance","name":"frontend.maintenance_en","action":"Modules\Frontend\Http\Controllers\AboutUsController@maintenance"},{"host":null,"methods":["GET","HEAD"],"uri":"en\/works","name":"frontend.works_en","action":"Modules\Frontend\Http\Controllers\AboutUsController@works"},{"host":null,"methods":["GET","HEAD"],"uri":"en\/contact-us","name":"frontend.about.contact_en","action":"Modules\Frontend\Http\Controllers\AboutUsController@contact"},{"host":null,"methods":["POST"],"uri":"en\/contact-us","name":"frontend.about.contact_en","action":"Modules\Frontend\Http\Controllers\AboutUsController@submitContact"},{"host":null,"methods":["GET","HEAD"],"uri":"sitemap","name":"sitemap","action":"Modules\Frontend\Http\Controllers\IndexController@sitemap"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

