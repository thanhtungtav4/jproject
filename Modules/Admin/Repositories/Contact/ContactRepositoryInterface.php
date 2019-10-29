<?php


namespace Modules\Admin\Repositories\Contact;


interface ContactRepositoryInterface
{
    /**
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = []);

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id);
}