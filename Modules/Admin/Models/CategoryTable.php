<?php


namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class CategoryTable extends Model
{
    use ListTableTrait;
    protected $table = 'tpcloud_cms_category';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name_vi',
        'name_en',
        'parent_id',
        'is_delete',
        'ordering',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    public function getListCore($filter = [])
    {
        $oSelect = $this
            ->where('parent_id',$filter['parent_id'])
            ->where('is_deleted',0)
            ->where('is_active',1);
        return $oSelect;
    }

    public function getCategoryDetail($id)
    {
        $oSelect = $this->where('id',$id)->first();
        return $oSelect;
    }

    public function createCategory($filter)
    {
        $oSelect = $this->insert($filter);
        return $oSelect;
    }

    public function updateCategory($id,$filter)
    {
        $oSelect = $this
            ->where('id',$id)
            ->update($filter);
        return $oSelect;
    }

    public function deleteCategory($filter)
    {
        $oSelect = $this->where('id', $filter['id'])->delete();
        return $oSelect;
    }
}
