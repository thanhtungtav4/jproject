<?php


namespace Modules\Admin\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class ContactTable extends Model
{
    use ListTableTrait;
    protected $table = 'tpcloud_cms_contact';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'fullname',
        'company',
        'phone',
        'email',
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_5',
        'question_6',
        'question_7',
        'question_8',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    /**
     * List contact
     *
     * @param array $filter
     * @return ContactTable
     */
    public function getListCore(&$filter = [])
    {
        $ds = $this->select(
            'id',
            'fullname',
            'company',
            'phone',
            'email',
            'created_at'
        )->orderBy('created_at', 'desc');

        if (isset($filter['keyword_search'])) {
            $search = $filter['keyword_search'];
            $ds->where(function ($query) use ($search) {
                $query->where('fullname', 'like', '%' . $search . '%')
                    ->orWhere('company', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
            unset($filter['keyword_search']);
        }

        if (isset($filter["created_at"])) {
            $arr_filter = explode(" - ", $filter["created_at"]);
            $startTime = Carbon::createFromFormat('d/m/Y', $arr_filter[0])->format('Y-m-d');
            $endTime = Carbon::createFromFormat('d/m/Y', $arr_filter[1])->format('Y-m-d');
            $ds->whereBetween('created_at', [$startTime. ' 00:00:00', $endTime. ' 23:59:59']);
            unset($filter['created_at']);
        }

        return $ds;
    }

    /**
     * Get contact by id
     *
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->where('id', $id)->first();
    }
}