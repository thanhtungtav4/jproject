<?php


namespace Modules\Admin\Repositories\Contact;


use Modules\Admin\Models\ContactTable;

class ContactRepository implements ContactRepositoryInterface
{
    protected $timestamps = true;
    protected $contact;

    public function __construct(
        ContactTable $contact
    ) {
        $this->contact = $contact;
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = [])
    {
        if (!isset($filters['keyword_search'])) {
            $filters['keyword_search'] = null;
        }
        if (!isset($filters['created_at'])) {
            $filters['created_at'] = null;
        }
        $result = [
            'list' =>  $this->contact->getList($filters),
            'filter' => $filters
        ];
        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->contact->getItem($id);
    }
}