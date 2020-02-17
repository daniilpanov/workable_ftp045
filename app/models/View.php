<?php


namespace app\models;


use engine\base\Model;

class View extends Model
{
    public $view_name;
    
    public function __construct($view_name)
    {
        $this->view_name = $view_name;
    }

    public function render($data, $type = "action-views")
    {
        // Распаковываем массив с параметрами
        extract($data, EXTR_OVERWRITE);
        // и подключаем вид
        include (path_convert(PHP_HOME . "/views/" . $type . "/" . $this->view_name . ".php"));
    }
}