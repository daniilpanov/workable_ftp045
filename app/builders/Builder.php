<?php


namespace app\builders;


use app\BaseObj;

abstract class Builder extends BaseObj
{
    protected $initialized = false;

    abstract public function init();
}