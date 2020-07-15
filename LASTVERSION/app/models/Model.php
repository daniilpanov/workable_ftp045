<?php


namespace app\models;


use app\BaseObj;

abstract class Model extends BaseObj
{
    public $id;

    public function setData($data)
    {
        foreach ($data as $prop => $datum)
            $this->$prop = $datum;
    }
}