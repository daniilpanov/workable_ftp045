<?php


namespace app\models;


class MailModel extends Model
{
    public $to, $subject,
        $message, $headers;

    public function __construct($to, $subject, $message, $headers)
    {
        self::setData($this, func_get_args());
    }

    public function send()
    {
        return mail($this->to, $this->subject, $this->message, $this->headers);
    }
}