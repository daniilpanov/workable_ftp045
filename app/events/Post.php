<?php

namespace app\events;


use app\factories\Factory;

class Post extends Request
{
    public $postKey, $model;

    public function __construct($postKey, $model, $controller, $method = null)
    {
        parent::__construct($controller, $method);

        $this->postKey = $postKey;
        $this->model = $model;
    }

    public function preInit($post)
    {
        if ($this->postKey === null)
            return ($post === null ? true : false);

        return (isset($post[$this->postKey])
                ? [Factory::models()->createModel($this->model, [$post])]
                : false
        );
    }
}