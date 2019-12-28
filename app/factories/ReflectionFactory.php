<?php


namespace app\factories;


class ReflectionFactory extends SingletonFactory
{
    public function getRef($class)
    {
        return $this->get($class, "\ReflectionClass", [$class]);
    }

    public function createWithoutConstruct($class)
    {
        return $this->getRef($class)->newInstanceWithoutConstructor();
    }
}