<?php


namespace app\models;


class ContactsModel extends Model
{
    public $company, $email, $subject, $message;

    public function __construct($data)
    {
        unset($data['contacts']);

        self::setData($this, $data);
    }
}