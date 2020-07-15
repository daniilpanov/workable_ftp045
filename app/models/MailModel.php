<?php


namespace app\models;


class MailModel extends \engine\base\Model
{
    public $to, $subject,
        $message, $headers;

    public function __construct($to, $subject, $message, $headers)
    {
        $this->setData(func_get_args());
    }

    public function send()
    {
        return mail($this->to, $this->subject, $this->message, $this->headers);
    }
}