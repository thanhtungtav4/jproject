<?php

namespace Modules\Frontend\Repositories\Contact;

use Matrix\Exception;
use Modules\Frontend\Models\ContactTable;

class ContactRepository implements ContactRepositoryInterface
{
    /**
     * @var ContactTable
     */
    protected $contact;

    public function __construct(ContactTable $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Lưu liên hệ
     *
     * @param array $data
     * @return array
     */
    public function add(array $data)
    {
        try {
            $dataContact = [
                'fullname' => strip_tags($data['fullname']),
                'email' => strip_tags($data['email']),
                'subject' => strip_tags($data['subject']),
                'note' => strip_tags($data['note']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $result = $this->contact->add($dataContact);
           // dd($result);
            return [
                'error' => 0,
                'message' => 'Success',
                'data' => $result
            ];
        } catch (Exception $e) {
            return [
                'error' => 1,
                'message' => 'Failed',
                'data' => null
            ];
        }
    }
}
