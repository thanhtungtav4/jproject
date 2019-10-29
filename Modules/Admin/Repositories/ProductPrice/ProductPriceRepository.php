<?php


namespace Modules\Admin\Repositories\ProductPrice;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Models\ProductPriceTable;

class ProductPriceRepository implements ProductPriceRepositoryInterface
{
    protected $productPrice;
    public function __construct(ProductPriceTable $productPrice)
    {
        $this->productPrice = $productPrice;
    }

    public function createProductPrice(array $filter = [])
    {
        if ($filter['name_vi'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tên sản phẩm tiếng Việt'
            ]);
        } elseif ($filter['name_en'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tên sản phẩm tiếng Anh'
            ]);
        } elseif ($filter['image_thumb'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu thêm Image'
            ]);
        } else {
            $user = Auth::user();
            $filter['name_vi'] = strip_tags($filter['name_vi']);
            $filter['name_en'] = strip_tags($filter['name_en']);
            $filter['alias_vi'] = str_slug($filter['name_vi'], '-');
            $filter['alias_en'] = str_slug($filter['name_en'], '-');
            $filter['created_at'] = now();
            $filter['updated_at'] = now();
            $filter['created_by'] = $user->id;
            $filter['updated_by'] = $user->id;

            $validator = \Validator::make($filter, [
                'name_vi' => 'max:250',
                'name_en' => 'max:250',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => ' Tên sản phẩm vượt quá 250 ký tự'
                ]);
            } else {
                $validator = \Validator::make($filter, [
                    'price' => 'numeric|min:0|max:9999999999',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'error' => true,
                        'message' => 'Giá sản phẩm không phải là số hoặc đã vượt quá giới hạn'
                    ]);
                } else {
                    $validator = \Validator::make($filter, [
                        'price_order' => 'integer|min:0|max:9999',
                    ]);
                    if ($validator->fails()) {
                        return response()->json([
                            'error' => true,
                            'message' => 'Vị trí không phải là số hoặc đã vượt quá giới hạn'
                        ]);
                    } else {
                        $checkAlias_Vi = $this->productPrice->checkAliasVi($filter['alias_vi']);
                        if ($checkAlias_Vi != 0) {
                            return response()->json([
                                'error' => true,
                                'message' => 'Tên sản phẩm tiếng Việt bị trùng'
                            ]);
                        } else {
                            $checkAlias_En = $this->productPrice->checkAliasEn($filter['alias_en']);
                            if ($checkAlias_En != 0) {
                                return response()->json([
                                    'error' => true,
                                    'message' => 'Tên sản phẩm tiếng Anh bị trùng'
                                ]);
                            } else {
                                if (isset($filter['is_feature'])) {
                                    $filter['is_feature'] = 1;
                                } else {
                                    $filter['is_feature'] = 0;
                                }

                                if (isset($filter['is_active'])) {
                                    $filter['is_active'] = 1;
                                } else {
                                    $filter['is_active'] = 0;
                                }

                                $filter['image_thumb'] = $this->transferTempfileToAdminfile(
                                    $filter['image_thumb'],
                                    str_replace('', '', $filter['image_thumb'])
                                );

                                $tmp = $this->productPrice->createProductPrice($filter);
                                return response()->json([
                                    'error' => false,
                                    'message' => 'Tạo sản phẩm thành công'
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }

    public function updateProductPrice(array $filter = [])
    {
        if ($filter['name_vi'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tên sản phẩm tiếng Việt'
            ]);
        } elseif ($filter['name_en'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tên sản phẩm tiếng Anh'
            ]);
        } else {
            $user = Auth::user();
            $filter['name_vi'] = strip_tags($filter['name_vi']);
            $filter['name_en'] = strip_tags($filter['name_en']);
            $filter['alias_vi'] = str_slug($filter['name_vi'], '-');
            $filter['alias_en'] = str_slug($filter['name_en'], '-');
            $filter['updated_at'] = now();
            $filter['created_by'] = $user->id;
            $filter['updated_by'] = $user->id;

            $validator = \Validator::make($filter, [
                'name_vi' => 'max:250',
                'name_en' => 'max:250',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => ' Tên sản phẩm vượt quá 250 ký tự'
                ]);
            } else {
                $validator = \Validator::make($filter, [
                    'price' => 'numeric|min:0|max:9999999999',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'error' => true,
                        'message' => 'Giá sản phẩm không phải là số hoặc đã vượt quá giới hạn'
                    ]);
                } else {
                    $validator = \Validator::make($filter, [
                        'price_order' => 'integer|min:0|max:9999',
                    ]);
                    if ($validator->fails()) {
                        return response()->json([
                            'error' => true,
                            'message' => 'Vị trí không phải là số hoặc đã vượt quá giới hạn'
                        ]);
                    } else {
                        if (isset($filter['is_feature'])) {
                            $filter['is_feature'] = 1;
                        } else {
                            $filter['is_feature'] = 0;
                        }

                        if (isset($filter['is_active'])) {
                            $filter['is_active'] = 1;
                        } else {
                            $filter['is_active'] = 0;
                        }

                        if (isset($filter['image_thumb'])) {
                            $filter['image_thumb'] = $this->transferTempfileToAdminfile(
                                $filter['image_thumb'],
                                str_replace('', '', $filter['image_thumb'])
                            );
                        } else {
                            unset($filter['image_thumb']);
                        }
                        $checkAliasDetail = $this->productPrice->checkAliasDetail(
                            $filter['id'],
                            $filter['alias_vi'],
                            $filter['alias_en']
                        );
                        if ($checkAliasDetail == 1) {
                            $id = $filter['id'];
                            unset($filter['id']);
                            $tmp = $this->productPrice->updateProductPrice($id, $filter);
                            return response()->json([
                                'error' => false,
                                'message' => 'Cập nhật sản phẩm thành công'
                            ]);
                        } else {
                            $checkAlias_Vi = $this->productPrice->checkAliasVi($filter['alias_vi']);
                            if ($checkAlias_Vi != 0) {
                                return response()->json([
                                    'error' => true,
                                    'message' => 'Tên sản phẩm tiếng Việt bị trùng'
                                ]);
                            } else {
                                $checkAlias_En = $this->productPrice->checkAliasEn($filter['alias_en']);
                                if ($checkAlias_En != 0) {
                                    return response()->json([
                                        'error' => true,
                                        'message' => 'Tên sản phẩm tiếng Anh bị trùng'
                                    ]);
                                } else {
                                    $id = $filter['id'];
                                    unset($filter['id']);
                                    $tmp = $this->productPrice->updateProductPrice($id, $filter);
                                    return response()->json([
                                        'error' => false,
                                        'message' => 'Tạo sản phẩm thành công'
                                    ]);
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function getListProductPrice(array $filter = [])
    {
//        return $this->productPrice->getList($filter);
        unset($filter['page_type']);
        unset($filter['is_active']);
        unset($filter['is_feature']);
//        return $this->productPrice->getListProductPrice($filter);
        return $this->productPrice->getList($filter);
    }

    public function changeProductPrice(array $filter = [])
    {
        $tmp = $this->productPrice->changeProductPrice($filter);
        return response()->json([
            'error' => false,
            'message' => 'Cập nhật thành công'
        ]);
    }

    public function getProductPriceDetail($id)
    {
        return $this->productPrice->getProductPriceDetail($id);
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
