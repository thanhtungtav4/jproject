<?php

use Illuminate\Support\Facades\App;

define('PAGING_ITEM_PER_PAGE', 10);
define('LOGIN_HOME_PAGE', 'core.user.index');
//Upload
define('TEMP_PATH', 'temp_upload');
define('USER_PATH', 'uploads/user/');
define('BLOG_CATEGORY_PATH', 'uploads/admin/blog-category/');
define('BLOG_PATH', 'uploads/admin/blog/');
define('AGENCY_PATH', 'uploads/admin/agency/');
define('CONFIG_PATH', 'uploads/admin/config/');
define('SUPPORT_PATH', 'uploads/admin/support/');
define('PLUGIN', 'uploads/admin/plugin/');


define('BASE_URL_API', '');
define('IMPORT_DATA_STATION', 'uploads/admin/import-data-station/');
define('ROW_IMPORT', 1000);
define('CODE_SUCCESS', '');
define('CODE_FAILED', 1);

// Minh
define('END_POINT_PAGING', 5);
define('NOTIFICATION_PAGING', 10);

//Upload Azure
define('CONTAINER_NAME', 'images'); // Blob container

define('BLOB_PROTOCOL', 'https'); // Blob protocol

define('BLOB_ACCOUNT_NAME', 'waomystore'); // Blob account
//define('CODE_SUCCESS', ''); // Blob account

define('BLOB_ACCOUNT_KEY', 'edMCSopWhRpyFvN5sP3gfQssfnfxb3eicv5ciTWbDz5DZp12xlwFpMUJfpS1IyFy/5Ms0H6XvNem/xItLPoT+g=='); // Blob account key

define('CONNECTION_STRING', 'DefaultEndpointsProtocol=' . BLOB_PROTOCOL . ';AccountName='. BLOB_ACCOUNT_NAME .';AccountKey=' . BLOB_ACCOUNT_KEY); // Chuỗi kết nối đến Azure Blob

if (! function_exists('subString')) {
    function subString($value, $limit = 50, $end = '...')
    {
        return \Illuminate\Support\Str::limit($value, $limit, $end);
    }
}

if (! function_exists('getValueByLang')) {
    function getValueByLang($fieldName, $locale = null)
    {
        if(!$locale) $locale = App::getLocale();
        return $fieldName.$locale;
    }
}
