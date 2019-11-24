<?php


namespace app\builders;


use engine\baseOf\EventKernel;

class PostEvBuilder extends Builder
{
    public static $default_controller = null;

    public $controller, $method = null, $post = null;

    public function __construct()
    {
        $this->controller = self::$default_controller;
    }

    public function controller($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    public function method($method)
    {
        $this->method = $method;
        return $this;
    }

    public function post($key = null, $value = null)
    {
        $this->post[$key] = $value;
        return $this;
    }

    public function init()
    {
        return EventKernel::get()->create("Post", $this->post, $this->controller, $this->method);
    }
}