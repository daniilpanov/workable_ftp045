<?php


namespace app;


use app\exceptions\DenyCLException;
use app\providers\Provider;

class AdvancedObj
{
    // ;,,,,,)
    private $novalset = null;
    // Providers
    private $varGetProviders = ["*" => null],
        $varSetProviders = ["*" => null],
        $methodCallProviders = ["*" => null];

    // BaseObj
    private $obj;

    public function __construct($obj)
    {
        $this->obj = $obj;

        $vars = get_object_vars($obj);
        $methods = get_class_methods(get_class($obj));

        foreach ($vars as $name => $value)
        {
            $this->varGetProviders[$name] = null;
            $this->varSetProviders[$name] = null;
        }

        foreach ($methods as $method)
            $this->methodCallProviders[$method] = null;
    }

    public function __call($name, $arguments)
    {
        $providers = $this->methodCallProviders['*'];

        if (isset($this->methodCallProviders[$name]))
            array_merge($this->methodCallProviders[$name]);

        if (is_array($providers))
        {
            foreach ($providers as $methodCallProvider)
            {
                $code = $methodCallProvider->provide(Provider::TYPE_METHOD_CALL, $name, $arguments);
                if ($code === Provider::DENY)
                    return false;
                elseif ($code === Provider::STOP)
                    break;
            }
        }

        return $this->obj->$name(...$arguments);
    }

    public function __get($varname)
    {
        $providers = $this->varGetProviders['*'];

        if (isset($this->varGetProviders[$varname]))
            array_merge($this->varGetProviders[$varname]);

        if (is_array($providers))
        {
            foreach ($providers as $varGetProvider)
            {
                $code = $varGetProvider->provide(Provider::TYPE_VAR_GET, $varname, $this->novalset);
                if ($code === Provider::DENY)
                    throw new DenyCLException();
                elseif ($code === Provider::STOP)
                    break;
            }
        }

        return $this->obj->$varname;
    }

    public function __set($varname, $value)
    {
        $providers = $this->varSetProviders['*'];

        if (isset($this->varSetProviders[$varname]))
            array_merge($this->varSetProviders[$varname]);

        if (is_array($providers))
        {
            foreach ($providers as $varSetProvider)
            {
                $code = $varSetProvider->provide(Provider::TYPE_VAR_GET, $varname, $value);
                if ($code === Provider::DENY)
                    return false;
                elseif ($code === Provider::STOP)
                    break;
            }
        }

        $this->obj->$varname = $value;
        return true;
    }

    public function __invoke()
    {
        return $this->__call("__invoke", func_get_args());
    }

    public function addProvider(Provider $provider)
    {
        if ($provider->options['type'] == "*")
        {
            $cloned = clone $provider;
            $cloned->options['type'] = Provider::TYPE_VAR_GET;
            $this->addProvider($cloned);

            $cloned = clone $provider;
            $cloned->options['type'] = Provider::TYPE_VAR_SET;
            $this->addProvider($cloned);

            $cloned = clone $provider;
            $cloned->options['type'] = Provider::TYPE_METHOD_CALL;
            $id = $this->addProvider($cloned)->ID;

            $provider->init($id);

            return $provider;
        }

        $providers_group_key = $provider->options['type'] . "Providers";
        $providers_group = &$this->$providers_group_key;

        if ($provider->options['for'] != "*" && !isset($providers_group[$provider->options['for']]))
            return false;

        if ($providers_group[$provider->options['for']] === null)
            $providers_group[$provider->options['for']] = [];

        $providers_group[$provider->options['for']][] = $provider;

        $providerID = count($providers_group[$provider->options['for']]) - 1;
        $provider->init($providerID);

        return $provider;
    }

    public function getBaseInstance()
    {
        return $this->obj;
    }


    public static function isAdvanced($obj)
    {
        return get_class($obj) == self::class;
    }

    public static function makeAdvanced(BaseObj $obj)
    {
        return (new self($obj));
    }
}