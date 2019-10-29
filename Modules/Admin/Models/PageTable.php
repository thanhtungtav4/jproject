<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class PageTable extends Model
{
    use ListTableTrait;

    protected $table = 'tpcloud_cms_page';
    protected $primaryKey = 'page_id';
    protected $fillable = [
        'page_id',
        'category_id',
        'page_type',
        'page_alias_vi',
        'page_alias_en',
        'page_title_vi',
        'page_title_en',
        'page_sub_title_1_vi',
        'page_sub_title_1_en',
        'page_sub_title_2_vi',
        'page_sub_title_2_en',
        'page_sub_title_3_vi',
        'page_sub_title_3_en',
        'page_content_1_vi',
        'page_content_1_en',
        'page_content_2_vi',
        'page_content_2_en',
        'background',
        'page_position',
    ];

    public function getListCore($filter = [])
    {
        $ds = $this
            ->select('tpcloud_cms_page.*','tpcloud_cms_category.name_vi as name_vi','tpcloud_cms_category.name_en as name_en')
            ->join('tpcloud_cms_category','tpcloud_cms_category.id','tpcloud_cms_page.category_id')
            ->orderBy('updated_at', 'desc');
        return $ds;
    }

//    public function getPage($page_type)
//    {
//        $oSelect = $this
//            ->where('tpcloud_cms_page.page_type', $page_type)
//            ->get();
//        return $oSelect;
//    }

    public function createPage($filter)
    {
        $oSelect = $this->insert($filter);
        return $oSelect;
    }

    public function checkAlias($alias_vi, $alias_en, $page_type)
    {
        $oSelect = $this
            ->where('page_alias_vi', $alias_vi)
            ->where('page_alias_en', $alias_en)
            ->where('page_type' , $page_type)
            ->get();
        return count($oSelect);
    }

    public function checkCreateAliasVi($alias_vi,$page_type)
    {
        $oSelect = $this
            ->where('page_alias_vi', $alias_vi)
            ->where('page_type' , $page_type)
            ->get();
        return count($oSelect);
    }

    public function checkCreateAliasEn($alias_en,$page_type)
    {
        $oSelect = $this
            ->where('page_alias_en', $alias_en)
            ->where('page_type' , $page_type)
            ->get();
        return count($oSelect);
    }

    public function checkUpdateAlias($id, $alias_vi, $alias_en)
    {
        $oSelect = $this
            ->where('page_alias_vi', $alias_vi)
            ->where('page_alias_en', $alias_en)
            ->where('page_id', $id)
            ->get();
        return count($oSelect);
    }

    public function checkUpdateAliasVi($id, $alias_vi, $page_type)
    {
        $oSelect = $this
            ->where('page_alias_vi', $alias_vi)
            ->where('page_type', $page_type)
            ->where('page_id', "<>", $id)
            ->get();
        return count($oSelect);
    }

    public function checkUpdateAliasEn($id, $alias_en , $page_type)
    {
        $oSelect = $this
            ->where('page_alias_en', $alias_en)
            ->where('page_type',$page_type)
            ->where('page_id', "<>", $id)
            ->get();
        return count($oSelect);
    }

    public function updatePage($id, $filter)
    {
        $oSelect = $this->where('page_id', $id)->update($filter);
        return $oSelect;
    }

    public function deletePage($filter)
    {
        $oSelect = $this->where('page_id', $filter['page_id'])->delete();
        return $oSelect;
    }

    public function changeStatus($filter)
    {
        $oSelect = $this->where('page_id', $filter['id'])->update(['is_active' => $filter['is_active']]);
        return $oSelect;
    }

    public function getPageDetail($id)
    {
        $oSelect = $this->where('page_id', $id)->first();
        return $oSelect;
    }

    public function getPageId($page_alias_vi)
    {
        $oSelect = $this->where('page_alias_vi', $page_alias_vi)->select('page_id','page_title_vi')->first();
        return $oSelect;
    }
}
