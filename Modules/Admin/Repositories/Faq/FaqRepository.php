<?php


namespace Modules\Admin\Repositories\Faq;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Models\FaqTable;

class FaqRepository implements FaqRepositoryInterface
{
    protected $faq;

    public function __construct(
        FaqTable $faq
    ) {
        $this->faq = $faq;
    }

    /**
     * @param array $filters
     * @return array|mixed
     */
    public function list(array $filters = [])
    {
        if (!isset($filters['keyword_search'])) {
            $filters['keyword_search'] = null;
        }
        $result = [
            'list' =>  $this->faq->getList($filters),
            'filter' => $filters
        ];
        return $result;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        try {
            DB::beginTransaction();

            $data['faq_order'] = strip_tags($data['faq_order']);
            $data['created_by'] = Auth::id();
            $data['updated_by'] = Auth::id();
            $this->faq->add($data);

            DB::commit();
            $result = [
                'error' => false,
                'message' => __('admin::validation.faq.success')
            ];
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            $result = [
                'error' => true,
                'message' => __('admin::validation.faq.fail')
            ];
            return $result;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->faq->getItem($id);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        try {
            DB::beginTransaction();

            $data['faq_order'] = strip_tags($data['faq_order']);
            $data['updated_by'] = Auth::id();
            $this->faq->edit($data, $id);

            DB::commit();
            $result = [
                'error' => false,
                'message' => __('admin::validation.faq.update_success')
            ];
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            $result = [
                'error' => true,
                'message' => __('admin::validation.faq.update_fail')
            ];
            return $result;
        }
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function changeStatus(array $data, $id)
    {
        return $this->faq->edit($data, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->faq->remove($id);
    }
}