<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class ProductPriceTable extends Model
{
    use ListTableTrait;

    protected $table = 'tpcloud_cms_product_price';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'page_id',
        'name_vi',
        'name_en',
        'alias_vi',
        'alias_en',
        'image_thumb',
        'description_vi',
        'description_en',
        'price',
        'price_order',
        'is_feature',
        'is_active',
        'is_deleted',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    public function getListCore($filter = [])
    {
        $oSelect = $this
            ->where('page_id', $filter['page_id'])
            ->where('is_deleted', 0);
        return $oSelect;
    }

//    public function getListProductPrice($filter)
//    {
//        $oSelect = $this
//            ->where('page_id', $filter['page_id'])
//            ->where('is_deleted', 0)->get();
//        return $oSelect;
//    }

    public function changeProductPrice($filter)
    {
        if ($filter['type'] == 'is_feature') {
            $oSelect = $this->where('id', $filter['id'])->update(['is_feature' => $filter['value']]);
            return $oSelect;
        } else {
            $oSelect = $this->where('id', $filter['id'])->update(['is_active' => $filter['value']]);
            return $oSelect;
        }
    }

    public function createProductPrice($filter)
    {
        $oSelect = $this->insert($filter);
        return $oSelect;
    }

    public function checkAliasVi($alias_vi)
    {
        $oSelect = $this->where('alias_vi', $alias_vi)
            ->get();
        return $oSelect->count();
    }

    public function checkAliasEn($alias_en)
    {
        $oSelect = $this->where('alias_en', $alias_en)
            ->get();
        return $oSelect->count();
    }

    public function getProductPriceDetail($id)
    {
        $oSelect = $this->where('id', $id)->first();
        return $oSelect;
    }

    public function checkAliasDetail($id, $alias_vi, $alias_en)
    {
        $oSelect = $this
            ->where('id', $id)
            ->where('alias_vi', $alias_vi)
            ->where('alias_en', $alias_en)
            ->get();
        return $oSelect->count();
    }

    public function updateProductPrice($id, $filter)
    {
        $oSelect = $this->where('id', $id)
            ->update($filter);
        return $oSelect;
    }
}
