<?php


namespace app\factories;


use app\BaseObj;

final class Controllers extends BaseObj
{
    public static function getController($name)
    {
        $namespace = "\\app\\controllers\\$name";
        if (class_exists($namespace))
            return $namespace::get();
        else
            return false;
    }
}