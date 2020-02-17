<?php


namespace app\factories;


final class Factory extends SingletonFactory
{
    private static $instance = null;

    /**
     * @return MultiFactory|SingletonFactory|null
     */
    public static function __callStatic($name, $arguments)
    {
        if (self::$instance === null)
            self::$instance = new self();

        $name .= "Factory";

        return self::$instance->$name(...$arguments);
    }

    /**
     * @return ModelsFactory
     */
    public function modelsFactory()
    {
        return $this->get(ModelsFactory::class);
    }

    /**
     * @return EventsFactory
     */
    public function eventsFactory()
    {
        return $this->get(EventsFactory::class);
    }

    /**
     * @return ControllersFactory
     */
    public function controllersFactory()
    {
        return $this->get(ControllersFactory::class);
    }

    /**
     * @return ReflectionFactory
     */
    public function reflectionFactory()
    {
        return $this->get(ReflectionFactory::class);
    }

    /**
     * @return MultiFactory|SingletonFactory|null
     */
    public function getFactory($factory)
    {
        return $this->get("app\\factories\\{$factory}Factory");
    }
}