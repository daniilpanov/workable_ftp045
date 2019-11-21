<?php


namespace app\factories;


class CommandsFactory extends SingletonFactory
{
    public function getCommandClass($command_class, $is_absolute_namespace = false)
    {
        if ($is_absolute_namespace)
        {
            $namespace = $command_class;
            $parsed_namespace = explode("\\", $command_class);
            $command_class = end($parsed_namespace);
        }
        else
        {
            $command_class .= "Commands";
            $namespace = "app\\commands\\$command_class";
        }

        return $this->get($command_class, $namespace);
    }
}