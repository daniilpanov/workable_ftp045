<?php


namespace app\factories;


final class Factory extends SingletonFactory
{
    private static $instance = null;

    public static function __callStatic($name, $arguments)
    {
        if (self::$instance === null)
            self::$instance = new self();

        $name .= "Factory";

        return self::$instance->$name(...$arguments);
    }

    public function modelsFactory()
    {
        return $this->get(ModelsFactory::class);
    }

    public function eventsFactory()
    {
        return $this->get(EventsFactory::class);
    }

    public function commandsFactory()
    {
        return $this->get(CommandsFactory::class);
    }

    public function controllersFactory()
    {
        return $this->get(ControllersFactory::class);
    }

    public function buildersFactory()
    {
        return $this->get(BuildersFactory::class);
    }

    public function reflectionFactory()
    {
        return $this->get(ReflectionFactory::class);
    }

    public function getFactory($factory)
    {
        return $this->get("app\\factories\\{$factory}Factory");
    }
}