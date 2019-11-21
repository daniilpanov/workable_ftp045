<?php


namespace app\providers;


use app\BaseObj;

abstract class Provider extends BaseObj
{
    abstract public function methodProvide($method, &$arguments = []);

    abstract public function varProvide(&$var, &$value, $old = true);

    abstract public function on();

    abstract public function off();
}