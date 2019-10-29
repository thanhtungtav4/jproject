<?php

namespace Modules\Frontend\Repositories\Contact;

interface ContactRepositoryInterface
{
    /**
     * Lưu liên hệ
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data);
}
