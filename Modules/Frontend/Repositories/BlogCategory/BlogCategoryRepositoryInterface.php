<?php

namespace Modules\Frontend\Repositories\BlogCategory;

interface BlogCategoryRepositoryInterface
{
    public function getListAll(array $filter = []);
}
