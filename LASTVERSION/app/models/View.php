<?php


namespace app\models;


use app\App;

class View extends Model
{
    public $view_path, $data;

    public function __construct($view, $layout = null, $data = [], $type = "php")
    {
        if (is_array($view) && $view['path'] === "absolute")
        {
            $this->view_path = $view['src'];
        }
        else
        {
            if (!$layout)
                $layout = App::get()->getInfo("current_layout");

            $this->view_path = "views" . DIRECTORY_SEPARATOR . $layout . DIRECTORY_SEPARATOR . $view . "." . $type;
        }

        $this->data = $data;
    }

    public function render()
    {
        if (!is_file($this->view_path))
            return false;

        if ($this->data)
            extract($this->data);
        return require_once $this->view_path;
    }
}