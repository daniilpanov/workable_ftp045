<?php


namespace app\models;


class ContactsModel extends \engine\base\Model
{
    public $company, $email, $subject, $message;

    public function __construct($data)
    {
        unset($data['contacts']);

        $this->setData($data);
    }
}