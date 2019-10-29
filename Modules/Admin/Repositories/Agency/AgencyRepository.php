<?php


namespace Modules\Admin\Repositories\Agency;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Models\AgencyTable;

class AgencyRepository implements AgencyRepositoryInterface
{
    protected $timestamps = true;
    protected $agency;

    public function __construct(
        AgencyTable $agency
    ) {
        $this->agency = $agency;
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
            'list' =>  $this->agency->getList($filters),
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

            $data['name_vi'] = strip_tags($data['name_vi']);
            $data['name_en'] = strip_tags($data['name_en']);
            $data['created_by'] = Auth::id();
            $data['updated_by'] = Auth::id();
            if (isset($data['image_logo'])) {
                $data['image_logo'] = $this->transferTempfileToAdminfile(
                    $data['image_logo'],
                    str_replace('', '', $data['image_logo'])
                );
            } else {
                unset($data['image_logo']);
            }
            $this->agency->add($data);

            DB::commit();

            $result = [
                'error' => false,
                'message' => __('admin::validation.agency.success')
            ];
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            $result = [
                'error' => true,
                'message' => __('admin::validation.agency.fail')
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
        return $this->agency->getItem($id);
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

            $data['name_vi'] = strip_tags($data['name_vi']);
            $data['name_en'] = strip_tags($data['name_en']);
            $data['updated_by'] = Auth::id();
            if (isset($data['image_logo'])) {
                $data['image_logo'] = $this->transferTempfileToAdminfile(
                    $data['image_logo'],
                    str_replace('', '', $data['image_logo'])
                );
            } else {
                unset($data['image_logo']);
            }
            $this->agency->edit($data, $id);

            DB::commit();

            $result = [
                'error' => false,
                'message' => __('admin::validation.agency.update_success')
            ];
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            $result = [
                'error' => true,
                'message' => __('admin::validation.agency.update_fail')
            ];
            return $result;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->agency->remove($id);
    }

    /**
     * Move image từ folder temp sang folder blog category
     *
     * @param $filename
     * @return string
     */
    private function transferTempfileToAdminfile($filename)
    {
        $old_path = TEMP_PATH . '/' . $filename;
        $new_path = AGENCY_PATH . date('Ymd') . '/' . $filename;
        Storage::disk('public')->makeDirectory(AGENCY_PATH . date('Ymd'));
        Storage::disk('public')->move($old_path, $new_path);
        return $new_path;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function changeStatus(array $data, $id)
    {
        return $this->agency->edit($data, $id);
    }
}