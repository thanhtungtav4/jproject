<?php


namespace Modules\Admin\Repositories\Plugin;

use Illuminate\Support\Facades\Storage;
use Modules\Admin\Models\MapTable;
use Modules\Admin\Models\PluginTable;

class PluginRepository implements PluginRepositoryInterface
{
    protected $map;
    protected $plugin;
    public function __construct(MapTable $map, PluginTable $plugin)
    {
        $this->map = $map;
        $this->plugin = $plugin;
    }

    public function createPlugin(array $data = [])
    {

        $page_id = $data['page_id'];
        $type = $data['type'];
        unset($data['page_id']);
        unset($data['type']);
        if ($data['plugin_title_vi'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tiêu đề tiếng Việt'
            ]);
        } elseif ($data['plugin_title_en'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tiêu đề tiếng Anh'
            ]);
        } else {
            $arr = [];
            foreach ($data as $key => $value) {
                if ($key == 'plugin_title_vi' || $key == 'plugin_title_en') {
                    $arr[$key] = strip_tags($value);
                } else {
                    $arr[$key] = $value;
                }
            }
            $validator = \Validator::make($arr, [
                'plugin_title_vi' => 'max:250',
                'plugin_title_en' => 'max:250',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => ' Tiêu đề phải ít hơn 250 ký tự'
                ]);
            } else {
                $validator = \Validator::make($arr, [
                    'plugin_order' => 'required|integer|numeric|min:0|max:100',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'error' => true,
                        'message' => 'Yêu cầu nhập thứ tự hiển thị từ 0 đến 100'
                    ]);
                } else {
                    if ($arr['plugin_type'] != 'item-box'){
                        if (isset($arr['plugin_image'])) {
                            $arr['plugin_image'] = $this->transferTempfileToAdminfile(
                                $arr['plugin_image'],
                                str_replace('', '', $arr['plugin_image'])
                            );
                        } else {
                            unset($arr['plugin_image']);
                        }
                    }
                  /** add icon Solution*/
                    if ($arr['plugin_type'] != 'item-box' && $arr['plugin_type'] == 'solution-list'){
                        if (isset($arr['icon_image'])) {
                            $arr['icon_image'] = $this->transferTempfileToAdminfile(
                                $arr['icon_image'],
                                str_replace('', '', $arr['icon_image'])
                            );
                        } else {
                            unset($arr['icon_image']);
                        }
                    }
                    if ($arr['plugin_type'] != 'item-box' && $arr['plugin_type'] == 'solution-list'){
                        if (isset($arr['icon2_image'])) {
                            $arr['icon2_image'] = $this->transferTempfileToAdminfile(
                                $arr['icon2_image'],
                                str_replace('', '', $arr['icon2_image'])
                            );
                        } else {
                            unset($arr['icon2_image']);
                        }
                    }
                    if ($arr['plugin_type'] != 'item-box' && $arr['plugin_type'] == 'solution-list'){
                        if (isset($arr['icon3_image'])) {
                            $arr['icon3_image'] = $this->transferTempfileToAdminfile(
                                $arr['icon3_image'],
                                str_replace('', '', $arr['icon3_image'])
                            );
                        } else {
                            unset($arr['icon3_image']);
                        }
                    }
                  /** !add icon solution**/
                    if (isset($arr['is_active'])) {
                        $arr['is_active'] = 1;
                    } else {
                        $arr['is_active'] = 0;
                    }
                    $id_plugin = $this->plugin->createPlugin($arr);
                    $data = $this->map->addPlugin(['page_id'=> $page_id,'plugin_id' => $id_plugin , 'type'=>$type]);
                    return response()->json([
                        'error' => false,
                        'message' => 'Tạo thành công'
                    ]);
                }
            }
        }
    }

    public function updatePlugin(array $data = [])
    {
        $plugin_id = $data['plugin_id'];
        unset($data['plugin_id']);
        if ($data['plugin_title_vi'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tiêu đề tiếng Việt'
            ]);
        } elseif ($data['plugin_title_en'] == null) {
            return response()->json([
                'error' => true,
                'message' => 'Yêu cầu nhập tiêu đề tiếng Anh'
            ]);
        } else {
            $arr = [];
            foreach ($data as $key => $value) {
                if ($key == 'plugin_title_vi' || $key == 'plugin_title_en') {
                    $arr[$key] = strip_tags($value);
                } else {
                    $arr[$key] = $value;
                }
            }

            $validator = \Validator::make($arr, [
                'plugin_title_vi' => 'max:250',
                'plugin_title_en' => 'max:250',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => ' Tiêu đề phải ít hơn 250 ký tự'
                ]);
            } else {
                $validator = \Validator::make($arr, [
                    'plugin_order' => 'required|integer|numeric|min:0|max:100',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'error' => true,
                        'message' => 'Yêu cầu nhập thứ tự hiển thị từ 0 đến 100'
                    ]);
                } else {
                    if ($arr['plugin_type'] != 'item-box'){
                        if (isset($arr['plugin_image'])) {
                            $arr['plugin_image'] = $this->transferTempfileToAdminfile(
                                $arr['plugin_image'],
                                str_replace('', '', $arr['plugin_image'])
                            );
                        } else {
                            unset($arr['plugin_image']);
                        }
                    }
                    /** add icon Solution*/
                    if ($arr['plugin_type'] != 'item-box' && $arr['plugin_type'] == 'solution-list'){
                        if (isset($arr['icon_image'])) {
                            $arr['icon_image'] = $this->transferTempfileToAdminfile(
                                $arr['icon_image'],
                                str_replace('', '', $arr['icon_image'])
                            );
                        } else {
                            unset($arr['icon_image']);
                        }
                    }
                    if ($arr['plugin_type'] != 'item-box' && $arr['plugin_type'] == 'solution-list'){
                        if (isset($arr['icon2_image'])) {
                            $arr['icon2_image'] = $this->transferTempfileToAdminfile(
                                $arr['icon2_image'],
                                str_replace('', '', $arr['icon2_image'])
                            );
                        } else {
                            unset($arr['icon2_image']);
                        }
                    }
                    if ($arr['plugin_type'] != 'item-box' && $arr['plugin_type'] == 'solution-list'){
                        if (isset($arr['icon3_image'])) {
                            $arr['icon3_image'] = $this->transferTempfileToAdminfile(
                                $arr['icon3_image'],
                                str_replace('', '', $arr['icon3_image'])
                            );
                        } else {
                            unset($arr['icon3_image']);
                        }
                    }
                    /** !add icon solution**/

                    unset($arr['plugin_type']);

                    if (isset($arr['is_active'])) {
                        $arr['is_active'] = 1;
                    } else {
                        $arr['is_active'] = 0;
                    }

                    $data = $this->plugin->updatePlugin($plugin_id, $arr);
                    return response()->json([
                        'error' => false,
                        'message' => 'Cập nhật thành công'
                    ]);
                }
            }
        }
    }

    public function getDetailPlugin($plugin_id)
    {
        return $this->plugin->getDetail($plugin_id);
    }

    public function deletePlugin(array $data = [])
    {
        $tmp = $this->plugin->deletePlugin($data);
        return response()->json([
            'error' => false,
            'message' => 'Xóa thành công'
        ]);
    }

    public function transferTempfileToAdminfile($filename)
    {
        $old_path = TEMP_PATH . '/' . $filename;
        $new_path = PLUGIN . date('Ymd') . '/' . $filename;
        Storage::disk('public')->makeDirectory(PLUGIN . date('Ymd'));
        Storage::disk('public')->move($old_path, $new_path);
        return $new_path;
    }

    public function changStatus($id, $is_active)
    {
        $change = $this->plugin->changStatus($id, $is_active);
        return response()->json([
            'error' => false,
            'message' => 'Cập nhật thành công'
        ]);
    }
}
