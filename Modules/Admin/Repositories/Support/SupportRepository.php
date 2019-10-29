<?php


namespace Modules\Admin\Repositories\Support;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Models\SupportTable;

class SupportRepository implements SupportRepositoryInterface
{
    protected $timestamps = true;
    protected $support;

    public function __construct(
        SupportTable $support
    ) {
        $this->support = $support;
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
            'list' =>  $this->support->getList($filters),
            'filter' => $filters
        ];
        return $result;
    }

    /**
     * @param array $data
     * @return array|mixed
     */
    public function add(array $data)
    {
        $data['title_vi'] = strip_tags($data['title_vi']);
        $data['title_en'] = strip_tags($data['title_en']);
//            $data['alias_vi'] = str_slug($data['title_vi']);
//            $data['alias_en'] = str_slug($data['title_en']);
        $data['description_vi'] = strip_tags($data['description_vi']);
        $data['description_en'] = strip_tags($data['description_en']);
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();
        $data['published_date'] = date('Y-m-d H:i:s');
        $data['published_by'] = Auth::id();
        if (isset($data['image_thumb'])) {
            $data['image_thumb'] = $this->transferTempfileToAdminfile(
                $data['image_thumb'],
                str_replace('', '', $data['image_thumb'])
            );
        } else {
            unset($data['image_thumb']);
        }

        $id_support = $this->support->add($data);

        $result = [
            'error' => false,
            'message' => __('admin::validation.support.success'),
            'id' => $id_support
        ];
        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->support->getItem($id);
    }

    public function edit(array $data, $id)
    {
        $data['title_vi'] = strip_tags($data['title_vi']);
        $data['title_en'] = strip_tags($data['title_en']);
//            $data['alias_vi'] = str_slug($data['title_vi']);
//            $data['alias_en'] = str_slug($data['title_en']);
        $data['description_vi'] = strip_tags($data['description_vi']);
        $data['description_en'] = strip_tags($data['description_en']);
        $data['updated_by'] = Auth::id();
        $data['published_date'] = date('Y-m-d H:i:s');
        $data['published_by'] = Auth::id();
        if (isset($data['image_thumb'])) {
            $data['image_thumb'] = $this->transferTempfileToAdminfile(
                $data['image_thumb'],
                str_replace('', '', $data['image_thumb'])
            );
        } else {
            unset($data['image_thumb']);
        }
        $this->support->edit($data, $id);


        $result = [
            'error' => false,
            'message' => __('admin::validation.support.update_success')
        ];
        return $result;
    }

    public function remove($id)
    {
        return $this->support->remove($id);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function changeStatus(array $data, $id)
    {
        return $this->support->edit($data, $id);
    }

    /**
     * Move image từ folder temp sang folder support
     *
     * @param $filename
     * @return string
     */
    private function transferTempfileToAdminfile($filename)
    {
        $old_path = TEMP_PATH . '/' . $filename;
        $new_path = SUPPORT_PATH . date('Ymd') . '/' . $filename;
        Storage::disk('public')->makeDirectory(SUPPORT_PATH . date('Ymd'));
        Storage::disk('public')->move($old_path, $new_path);
        return $new_path;
    }

}