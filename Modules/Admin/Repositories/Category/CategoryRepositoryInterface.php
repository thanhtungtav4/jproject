<?php

namespace Modules\Admin\Repositories\Category;

interface CategoryRepositoryInterface
{
    public function getListCategory(array $filter=[]);
    public function getCategoryDetail($id);
    public function createCategory(array $filter=[]);
    public function updateCategory(array $filter=[]);
    public function deleteCategory(array $filter=[]);
}
