<?php


namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class FaqTable extends Model
{
    use ListTableTrait;
    protected $table = 'tpcloud_cms_faq';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'question_vi',
        'question_en',
        'answer_vi',
        'answer_en',
        'faq_order',
        'is_active',
        'is_deleted',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    /**
     * List faq
     *
     * @param array $filter
     * @return mixed
     */
    public function getListCore(&$filter = [])
    {
        $ds = $this->select(
            'question_vi',
            'question_en',
            'faq_order',
            'is_active',
            'id'
        )->where('is_deleted', 0)->orderBy('created_at', 'desc');

        if (isset($filter['keyword_search'])) {
            $search = $filter['keyword_search'];
            $ds->where(function ($query) use ($search) {
                $query->where('question_vi', 'like', '%' . $search . '%')
                    ->orWhere('question_en', 'like', '%' . $search . '%')
                    ->orWhere('answer_vi', 'like', '%' . $search . '%')
                    ->orWhere('answer_en', 'like', '%' . $search . '%');
            });
            unset($filter['keyword_search']);
        }
        unset($filter['is_active']);
        return $ds;
    }

    /**
     * Create faq
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $add = $this->create($data);
        return $add->id;
    }

    /**
     * Get faq by id
     *
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
     * Update faq
     *
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        return $this->where('id', $id)->update($data);
    }

    /**
     * Remove faq
     *
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->where('id', $id)->update([
            'is_deleted' => 1
        ]);
    }
}
