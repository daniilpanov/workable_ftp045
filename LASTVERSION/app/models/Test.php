<?php


namespace app\models;


class Test extends Model
{
    public $testt;

    public function __construct($testt)
    {
        $this->testt = $testt;
    }
}