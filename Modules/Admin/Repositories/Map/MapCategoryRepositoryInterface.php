<?php


namespace Modules\Admin\Repositories\Map;

interface MapCategoryRepositoryInterface
{
    public function getList(array $data = []);
    public function getListMapPage($page_id);
    public function getListMapPageId(array $data = []);
    public function addPlugin(array $data = []);
    public function deletePlugin(array $data = []);
}
