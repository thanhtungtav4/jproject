<?php


namespace Modules\Admin\Repositories\Page;

interface PageRepositoryInterface
{
//    public function getPage($page_type);
    public function getPage(array $filter = []);
    public function getPageDetail($page_id);
    public function createPage(array $filter = []);
    public function editPage(array $filter = []);
    public function deletePage(array $filter = []);
    public function changeStatus(array $filter = []);
    public function getPageId($page_alias_vi);
}
