<?php


namespace Modules\Admin\Repositories\Solution;

interface SolutionRepositoryInterface
{
    public function getList(array $data = []);
    public function getListSolutionPage($page_id);
    public function addPlugin(array $data = []);
    public function deletePlugin(array $data = []);
}
