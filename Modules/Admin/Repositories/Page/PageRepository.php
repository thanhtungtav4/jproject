<?php


namespace Modules\Admin\Repositories\Page;

use Illuminate\Support\Facades\Storage;
use Modules\Admin\Models\PageTable;
use Modules\Admin\Repositories\PageSlug\PageSlugRepositoryInterface;

class PageRepository implements PageRepositoryInterface
{
    protected $page ;
    protected $page_slug;
    public function __construct(PageTable $page,PageSlugRepositoryInterface $page_slug)
    {
        $this->page = $page;
        $this->page_slug = $page_slug;
    }

    public function getPage(array $filter=[])
    {
//        return $this->page->getPage($page_type);
        unset($filter['page_id']);
        return $this->page->getList($filter);
    }

    public function getPageDetail($page_id)
    {
        return $this->page->getPageDetail($page_id);
    }

    public function createPage(array $filter = [])
    {
        if ($filter['page_title_vi'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tiêu đề tiếng Việt'
            ]);
        } elseif ($filter['page_title_en'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tiêu đề tiếng Anh'
            ]);
        } else {
            $validator = \Validator::make($filter, [
                'page_title_vi' => 'max:250',
                'page_title_en' => 'max:250',
                'page_sub_title_1_vi' => 'max:250',
                'page_sub_title_2_vi' => 'max:250',
                'page_sub_title_3_vi' => 'max:250',
                'page_sub_title_1_en' => 'max:250',
                'page_sub_title_2_en' => 'max:250',
                'page_sub_title_3_en' => 'max:250'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => ' Tiêu đề phải ít hơn 250 ký tự'
                ]);
            } else {
                $validator = \Validator::make($filter, [
                    'seo_title_vi' => 'max:250',
                    'seo_title_en' => 'max:250',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'error' => true,
                        'message' => ' Tiêu đề seo phải ít hơn 250 ký tự'
                    ]);
                } else {

                    $validator = \Validator::make($filter, [
                        'seo_description_vi' => 'max:250',
                        'seo_description_en' => 'max:250',
                    ]);

                    if ($validator->fails()) {
                        return response()->json([
                            'error' => true,
                            'message' => 'Nội dung seo phải ít hơn 250 ký tự'
                        ]);
                    } else {

                        $validator = \Validator::make($filter, [
                            'seo_keyword_vi' => 'max:250',
                            'seo_keyword_en' => 'max:250',
                        ]);

                        if ($validator->fails()) {
                            return response()->json([
                                'error' => true,
                                'message' => 'Từ khóa seo phải ít hơn 250 ký tự'
                            ]);
                        } else {

                            $validator = \Validator::make($filter, [
//                                'page_position' => 'required|integer|numeric|min:0|max:100',
                                'page_position' => 'integer|numeric|min:0|max:100',
                            ]);

                            if ($validator->fails()) {
                                return response()->json([
                                    'error' => true,
                                    'message' => 'Yêu cầu nhập vị trí từ 0 đến 100'
                                ]);
                            } else {

                                $validator = \Validator::make($filter, [
                                    'page_menu_vi' => 'max:250',
                                    'page_menu_en' => 'max:250'
                                ]);

                                if ($validator->fails()) {
                                    return response()->json([
                                        'error' => true,
                                        'message' => 'Tên menu vượt quá 250 ký tự'
                                    ]);
                                } else {

                                    $validator = \Validator::make($filter, [
                                        'page_icon' => 'max:100',
                                    ]);
                                    if ($validator->fails()) {
                                        return response()->json([
                                            'error' => true,
                                            'message' => 'Icon vượt quá 100 ký tự'
                                        ]);
                                    } else {
                                        $arr = [];
                                        foreach ($filter as $key => $value) {
                                            if ($key == 'page_title_vi') {
                                                $arr['page_alias_vi'] = str_slug($value, '-');
                                                $arr[$key] = strip_tags($value);
                                            } elseif ($key == 'page_title_en') {
                                                $arr['page_alias_en'] = str_slug($value, '-');
                                                $arr[$key] = strip_tags($value);
                                            } elseif ($key == 'page_sub_title_1_vi' ||
                                                $key == 'page_sub_title_2_vi' ||
                                                $key == 'page_sub_title_3_vi' ||
                                                $key == 'page_sub_title_1_en' ||
                                                $key == 'page_sub_title_2_en' ||
                                                $key == 'page_sub_title_3_en' ||
                                                $key == 'page_icon'           ||
                                                $key == 'seo_title_vi'        ||
                                                $key == 'seo_title_en'        ||
                                                $key == 'seo_description_vi'  ||
                                                $key == 'seo_description_en'  ||
                                                $key == 'seo_keyword_vi'      ||
                                                $key == 'seo_keyword_en'      ||
                                                $key == 'page_menu_vi'        ||
                                                $key == 'page_menu_en'

                                            ) {
                                                $arr[$key] = strip_tags($value);
                                            } else {
                                                $arr[$key] = $value;
                                            }
                                        }

//                                    if (isset($arr['page_image'])) {
//                                        $arr['page_image'] = $this->transferTempfileToAdminfile(
//                                            $arr['page_image'],
//                                            str_replace('', '', $arr['page_image'])
//                                        );
//                                    } else {
//                                        unset($arr['page_image']);
//                                    }

                                        if (isset($arr['seo_image'])) {
                                            $arr['seo_image'] = $this->transferTempfileToAdminfile(
                                                $arr['seo_image'],
                                                str_replace('', '', $arr['seo_image'])
                                            );
                                        } else {
                                            unset($arr['page_image']);
                                        }

//                                    if (isset($arr['background'])) {
//                                        $arr['background'] = $this->transferTempfileToAdminfile(
//                                            $arr['background'],
//                                            str_replace('', '', $arr['background'])
//                                        );
//                                    } else {
//                                        unset($arr['background']);
//                                    }

                                        $checkCreateAliasVi = $this->page->checkCreateAliasVi($arr['page_alias_vi'], $arr['page_type'] );
                                        if ($checkCreateAliasVi == 0) {
                                            $checkCreateAliasEn = $this->page->checkCreateAliasEn($arr['page_alias_en'], $arr['page_type'] );
                                            if ($checkCreateAliasEn == 0) {
                                                if (isset($arr['is_active'])) {
                                                    $arr['is_active'] = 1;
                                                } else {
                                                    $arr['is_active'] = 0;
                                                }

                                                if (isset($arr['is_menu'])) {
                                                    $arr['is_menu'] = 1;
                                                } else {
                                                    $arr['is_menu'] = 0;
                                                }
                                                $tmp = $this->page->createPage($arr);
                                                if ($arr['page_type'] == 'product') {
                                                    $this->page_slug->add(
                                                        'frontend.product.detail',
                                                        $arr['page_alias_vi'],
                                                        $arr['page_alias_en']
                                                    );
                                                }

                                                if ($arr['page_type'] == 'solution') {
                                                    $this->page_slug->add(
                                                        'frontend.solution.detail',
                                                        $arr['page_alias_vi'],
                                                        $arr['page_alias_en']
                                                    );
                                                }

                                                return response()->json([
                                                    'error' => false,
                                                    'message' => 'Tạo thành công'
                                                ]);
                                            } else {
                                                return response()->json([
                                                    'error' => true,
                                                    'message' => 'Tiêu đề tiếng anh bị trùng'
                                                ]);
                                            }
                                        } else {
                                            return response()->json([
                                                'error' => true,
                                                'message' => 'Tiêu đề tiếng việt bị trùng'
                                            ]);
                                        }
                                    }

                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function deletePage(array $filter = [])
    {
        $tmp = $this->page->deletePage($filter);
        return response()->json([
            'error' => false,
            'message' => 'Delete thành công'
        ]);
    }

    public function changeStatus(array $filter = [])
    {
        $tmp = $this->page->changeStatus($filter);
        return response()->json([
            'error' => false,
            'message' => 'Thay đổi thành công'
        ]);
    }

    public function editPage(array $filter = [])
    {
        if ($filter['page_title_vi'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tiêu đề tiếng Việt'
            ]);
        } elseif ($filter['page_title_en'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tiêu đề tiếng Anh'
            ]);
        } else {
            $validator = \Validator::make($filter, [
                'page_title_vi' => 'max:250',
                'page_title_en' => 'max:250',
                'page_sub_title_1_vi' => 'max:250',
                'page_sub_title_2_vi' => 'max:250',
                'page_sub_title_3_vi' => 'max:250',
                'page_sub_title_1_en' => 'max:250',
                'page_sub_title_2_en' => 'max:250',
                'page_sub_title_3_en' => 'max:250',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => ' Tiêu đề phải ít hơn 250 ký tự'
                ]);
            } else {

                $validator = \Validator::make($filter, [
                    'seo_title_vi' => 'max:250',
                    'seo_title_en' => 'max:250',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'error' => true,
                        'message' => ' Tiêu đề seo phải ít hơn 250 ký tự'
                    ]);
                } else {

                    $validator = \Validator::make($filter, [
                        'seo_description_vi' => 'max:250',
                        'seo_description_en' => 'max:250',
                    ]);

                    if ($validator->fails()) {
                        return response()->json([
                            'error' => true,
                            'message' => 'Nội dung seo phải ít hơn 250 ký tự'
                        ]);
                    } else {

                        $validator = \Validator::make($filter, [
                            'seo_keyword_vi' => 'max:250',
                            'seo_keyword_en' => 'max:250',
                        ]);

                        if ($validator->fails()) {
                            return response()->json([
                                'error' => true,
                                'message' => 'Từ khóa seo phải ít hơn 250 ký tự'
                            ]);
                        } else {

                            $validator = \Validator::make($filter, [
//                                'page_position' => 'required|integer|numeric|min:0|max:100',
                                'page_position' => 'integer|numeric|min:0|max:100',
                            ]);

                            if ($validator->fails()) {
                                return response()->json([
                                    'error' => true,
                                    'message' => 'Yêu cầu nhập vị trí từ 0 đến 100'
                                ]);
                            } else {

                                $validator = \Validator::make($filter, [
                                    'page_menu_vi' => 'max:250',
                                    'page_menu_en' => 'max:250'
                                ]);

                                if ($validator->fails()) {
                                    return response()->json([
                                        'error' => true,
                                        'message' => 'Tên menu vượt quá 250 ký tự'
                                    ]);
                                } else {
                                    $validator = \Validator::make($filter, [
                                        'page_icon' => 'max:100',
                                    ]);

                                    if ($validator->fails()) {
                                        return response()->json([
                                            'error' => true,
                                            'message' => 'Icon vượt quá 100 ký tự'
                                        ]);
                                    } else {
                                        $arr = [];
                                        $id = $filter['page_id'];
                                        unset($filter['page_id']);

                                        foreach ($filter as $key => $value) {
                                            if ($key == 'page_title_vi') {
                                                $arr['page_alias_vi'] = str_slug($value, '-');
                                                $arr[$key] = strip_tags($value);
                                            } elseif ($key == 'page_title_en') {
                                                $arr['page_alias_en'] = str_slug($value, '-');
                                                $arr[$key] = strip_tags($value);
                                            } elseif ($key == 'page_sub_title_1_vi' ||
                                                $key == 'page_sub_title_2_vi' ||
                                                $key == 'page_sub_title_3_vi' ||
                                                $key == 'page_sub_title_1_en' ||
                                                $key == 'page_sub_title_2_en' ||
                                                $key == 'page_sub_title_3_en' ||
                                                $key == 'page_icon'           ||
                                                $key == 'seo_title_vi'        ||
                                                $key == 'seo_title_en'        ||
                                                $key == 'seo_description_vi'  ||
                                                $key == 'seo_description_en'  ||
                                                $key == 'seo_keyword_vi'      ||
                                                $key == 'seo_keyword_en'      ||
                                                $key == 'page_menu_vi'        ||
                                                $key == 'page_menu_en'
                                            ) {
                                                $arr[$key] = strip_tags($value);
                                            } else {
                                                $arr[$key] = $value;
                                            }
                                        }

//                                    if (isset($arr['page_image'])) {
//                                        $arr['page_image'] = $this->transferTempfileToAdminfile(
//                                            $arr['page_image'],
//                                            str_replace('', '', $arr['page_image'])
//                                        );
//                                    } else {
//                                        unset($arr['page_image']);
//                                    }

                                        if (isset($arr['seo_image'])) {
                                            $arr['seo_image'] = $this->transferTempfileToAdminfile(
                                                $arr['seo_image'],
                                                str_replace('', '', $arr['seo_image'])
                                            );
                                        } else {
                                            unset($arr['page_image']);
                                        }

//                                    if (isset($arr['background'])) {
//                                        $arr['background'] = $this->transferTempfileToAdminfile(
//                                            $arr['background'],
//                                            str_replace('', '', $arr['background'])
//                                        );
//                                    } else {
//                                        unset($arr['background']);
//                                    }
                                        $checkAlias = $this->page->checkUpdateAlias($id, $arr['page_alias_vi'], $arr['page_alias_en']);
                                        if ($checkAlias == 1) {

                                            $getPageType = $this->page->getPageDetail($id);
                                            if ($getPageType['page_type'] == 'product' || $getPageType['page_type'] == 'solution'){
                                                if (isset($arr['is_active'])) {
                                                    $arr['is_active'] = 1;
                                                } else {
                                                    $arr['is_active'] = 0;
                                                }

                                                if (isset($arr['is_menu'])) {
                                                    $arr['is_menu'] = 1;
                                                } else {
                                                    $arr['is_menu'] = 0;
                                                }
                                            }
                                            if ($getPageType['page_type'] == 'product') {
                                                $this->page_slug->edit(
                                                    'frontend.product.detail',
                                                    $arr['page_alias_vi'],
                                                    $arr['page_alias_en'],
                                                    $getPageType['page_alias_vi'],
                                                    $getPageType['page_alias_en']
                                                );
                                            }

                                            if ($getPageType['page_type'] == 'solution') {
                                                $this->page_slug->edit(
                                                    'frontend.solution.detail',
                                                    $arr['page_alias_vi'],
                                                    $arr['page_alias_en'],
                                                    $getPageType['page_alias_vi'],
                                                    $getPageType['page_alias_en']
                                                );
                                            }
                                            $tmp = $this->page->updatePage($id, $arr);
                                            return response()->json([
                                                'error' => false,
                                                'message' => 'Cập nhật thành công'
                                            ]);
                                        } else {
                                            $getPageType = $this->page->getPageDetail($id);
                                            $checkAliasVi = $this->page->checkUpdateAliasVi($id, $arr['page_alias_vi'], $getPageType['page_type']);
                                            if ($checkAliasVi == 0) {
                                                $checkAliasEn = $this->page->checkUpdateAliasEn($id, $arr['page_alias_en'] , $getPageType['page_type']);
                                                if ($checkAliasEn == 0) {
                                                    if ($getPageType['page_type'] == 'product' || $getPageType['page_type'] == 'solution'){
                                                        if (isset($arr['is_active'])) {
                                                            $arr['is_active'] = 1;
                                                        } else {
                                                            $arr['is_active'] = 0;
                                                        }

                                                        if (isset($arr['is_menu'])) {
                                                            $arr['is_menu'] = 1;
                                                        } else {
                                                            $arr['is_menu'] = 0;
                                                        }
                                                    }

                                                    if ($getPageType['page_type'] == 'product') {
                                                        $this->page_slug->edit(
                                                            'frontend.product.detail',
                                                            $arr['page_alias_vi'],
                                                            $arr['page_alias_en'],
                                                            $getPageType['page_alias_vi'],
                                                            $getPageType['page_alias_en']
                                                        );
                                                    }

                                                    if ($getPageType['page_type'] == 'solution') {
                                                        $this->page_slug->edit(
                                                            'frontend.solution.detail',
                                                            $arr['page_alias_vi'],
                                                            $arr['page_alias_en'],
                                                            $getPageType['page_alias_vi'],
                                                            $getPageType['page_alias_en']
                                                        );
                                                    }
                                                    $tmp = $this->page->updatePage($id, $arr);
                                                    return response()->json([
                                                        'error' => false,
                                                        'message' => 'Cập nhật thành công'
                                                    ]);
                                                } else {
                                                    return response()->json([
                                                        'error' => true,
                                                        'message' => 'Tiêu đề tiếng anh bị trùng'
                                                    ]);
                                                }
                                            } else {
                                                return response()->json([
                                                    'error' => true,
                                                    'message' => 'Tiêu đề tiếng việt bị trùng'
                                                ]);
                                            }
                                        }
                                    }

                                }
                            }

                        }
                    }
                }
            }
        }
    }

    public function getPageId($page_alias_vi)
    {
        return $this->page->getPageId($page_alias_vi);
    }

    public function transferTempfileToAdminfile($filename)
    {
        $old_path = TEMP_PATH . '/' . $filename;
        $new_path = BLOG_CATEGORY_PATH . date('Ymd') . '/' . $filename;
        Storage::disk('public')->makeDirectory(BLOG_CATEGORY_PATH . date('Ymd'));
        Storage::disk('public')->move($old_path, $new_path);
        return $new_path;
    }
}
