<?php


namespace app\controllers;


use app\BaseObj;

abstract class Controller extends BaseObj
{
    private static $inst = null;

    public static function get()
    {
        if (!self::$inst)
            self::$inst = new static();

        return self::$inst;
    }
}