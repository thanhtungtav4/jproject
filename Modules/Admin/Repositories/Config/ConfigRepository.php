<?php


namespace Modules\Admin\Repositories\Config;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Models\ConfigTable;

class ConfigRepository implements ConfigRepositoryInterface
{
    protected $config;

    public function __construct(
        ConfigTable $config
    ) {
        $this->config = $config;
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = [])
    {
        return $this->config->getList($filters);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->config->getItem($id);
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

            if ($data['type'] == 'input') {
                $data['value_vi'] = strip_tags($data['value_vi']);
                $data['value_en'] = strip_tags($data['value_en']);
            } elseif ($data['type'] == 'image') {
                if (isset($data['logo'])) {
                    $data['value_vi'] = $this->transferTempfileToAdminfile(
                        $data['logo'],
                        str_replace('', '', $data['logo'])
                    );
                    $data['value_en'] = $data['value_vi'];
                }
            }
            $data['updated_by'] = Auth::id();
            unset($data['logo'], $data['type']);
            $this->config->edit($data, $id);
            DB::commit();
            $result = [
                'error' => false,
                'message' => __('admin::validation.blog.update_success')
            ];
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            $result = [
                'error' => true,
                'message' => __('admin::validation.blog.update_fail')
            ];
            return $result;
        }
    }

    /**
     * Move image từ folder temp sang folder config
     *
     * @param $filename
     * @return string
     */
    private function transferTempfileToAdminfile($filename)
    {
        $old_path = TEMP_PATH . '/' . $filename;
        $new_path = CONFIG_PATH . date('Ymd') . '/' . $filename;
        Storage::disk('public')->makeDirectory(CONFIG_PATH . date('Ymd'));
        Storage::disk('public')->move($old_path, $new_path);
        return $new_path;
    }
}