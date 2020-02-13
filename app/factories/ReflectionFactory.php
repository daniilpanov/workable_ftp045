<?php


namespace app\factories;


class ReflectionFactory extends SingletonFactory
{
    public function getRef($clazz)
    {
        return $this->get($clazz, "\ReflectionClass", [$clazz]);
    }

    public function createWithoutConstruct($clazz)
    {
        return $this->getRef($clazz)->newInstanceWithoutConstructor();
    }
}