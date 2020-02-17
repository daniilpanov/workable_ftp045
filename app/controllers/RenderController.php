<?php


namespace app\controllers;


use app\factories\Factory;
use app\models\View;
use engine\base\Controller;

class RenderController extends Controller
{
    /** @var $renders View[][] */
    private $renders = [];

    public function render($view, $data = [], $type = "action-views")
    {
        $model = Factory::models()->createIfNotExists("View", ['view_name' => $view]);

        $new_data = [];

        foreach ($data as $var_name => $var_value)
        {
            $var_name = str_replace("-", "_", $var_name);
            $new_data[$var_name] = $var_value;
        }

        $this->renders[] = ['model' => $model, 'data' => $new_data, 'type' => $type];
    }

    public function makeVisible()
    {
        foreach ($this->renders as $render)
        {
            $render['model']->render($render['data'], $render['type']);
        }
    }
}