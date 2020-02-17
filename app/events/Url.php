<?php

namespace app\events;


class Url extends Request
{
    public $url;

    public function __construct($url, $controller, $method = null)
    {
        parent::__construct($controller, $method);

        $this->url = $url;
    }

    public function preInit($params)
    {
        if (!isset($params['url']))
            return false;

        if (preg_match($this->url, $params['url'], $arguments))
        {
            unset($arguments[0]);
            return $arguments;
        }

        return null;
    }
}