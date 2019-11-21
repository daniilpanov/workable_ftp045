<?php


namespace app\commands;


use app\factories\Factory;

class RenderCommands extends Command
{
    private $renders = [];

    public function renderC($view, ...$data)
    {
        $model = Factory::models()->createIfNotExists("View", ['view_name' => $view]);

        $new_data = [];

        foreach ($data as $datum)
        {
            foreach ($datum as $var_name => $var_value)
            {
                $var_name = str_replace("-", "_", $var_name);
                $new_data[$var_name] = $var_value;
            }
        }

        $this->renders[] = ['model' => $model, 'data' => $new_data];
    }

    public function makeVisibleC()
    {
        foreach ($this->renders as $render)
        {
            $render['model']->render($render['data']);
        }
    }
}