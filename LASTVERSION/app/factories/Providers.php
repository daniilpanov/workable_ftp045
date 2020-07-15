<?php


namespace app\factories;


use app\BaseObj;

final class Providers extends BaseObj
{
    public static $namespace = "\\app\\providers\\";

    public static function addProvider($provider)
    {
        $nsc = self::$namespace . $provider[0];
        return new $nsc(...$provider[1]);
    }
}