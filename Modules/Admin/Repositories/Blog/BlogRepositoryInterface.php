<?php


namespace Modules\Admin\Repositories\Blog;


interface BlogRepositoryInterface
{
    /**
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = []);

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id);

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id);
}