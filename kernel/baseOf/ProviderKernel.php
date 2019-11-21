<?php


namespace engine\baseOf;


use app\BaseObj;
use app\providers\Provider;
use app\ProvidingObj;

class ProviderKernel
{
    private static $inst = null;

    public static function get()
    {
        return (self::$inst === null ? (self::$inst = new self) : self::$inst);
    }

    protected function __construct()
    {
    }

    /**
     * @param BaseObj $object
     * @return ProvidingObj|BaseObj
     */
    public function makeObjectProvidable(BaseObj $object)
    {
        return new ProvidingObj($object);
    }

    public function provide(ProvidingObj $obj, Provider $provider, $params)
    {
        $methods = (isset($params['methods']) ? $params['methods'] : []);
        $vars = (isset($params['vars']) ? $params['vars'] : []);

        $obj->addProvider($provider, $methods, $vars);
    }
}