<?php


namespace app;


use app\providers\Provider;

class ProvidingObj extends BaseObj
{
    private $providers_counter = -1;
    private $obj;
    private $providers = [];

    public function __construct(BaseObj $obj)
    {
        $this->obj = $obj;
    }

    public function __call($name, $arguments)
    {
        foreach ($this->providers as $provider)
        {
            if (array_search($name, $provider['methods']) !== false)
                $provider['obj']->methodProvide($name, $arguments);
        }

        return $this->obj->$name(...$arguments);
    }

    public function __get($name)
    {
        foreach ($this->providers as $provider)
        {
            if (array_search($name, $provider['vars']) !== false)
                $provider['obj']->varProvide($name, $this->obj->$name);
        }

        return $this->obj->$name;
    }

    public function __set($name, $value)
    {
        foreach ($this->providers as $provider)
        {
            if (array_search($name, $provider['vars']) !== false)
                $provider['obj']->varProvide($name, $value, false);
        }

        $this->obj->$name = $value;
    }

    public function __clone()
    {
        foreach ($this->providers as $provider)
        {
            if (array_search("__clone", $provider['methods']) !== false)
                $provider['obj']->methodProvide("__clone");
        }

        return new self(clone $this->obj);
    }

    public function addProvider(Provider $provider, $methods = [], $vars = [])
    {
        $this->providers_counter ++;

        $this->providers[$this->providers_counter]['obj'] = $provider;
        $this->providers[$this->providers_counter]['methods'] = $methods;
        $this->providers[$this->providers_counter]['vars'] = $vars;

        $provider->on();

        return $this->providers_counter;
    }

    public function removeProvider(int $key)
    {
        $this->providers[$key]['obj']->off();
        unset($this->providers[$key]);
    }
}