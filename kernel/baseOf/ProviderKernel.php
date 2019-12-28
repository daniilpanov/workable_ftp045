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
    public function makeObjectProvidable($object)
    {
        return new ProvidingObj($object);
    }

    /**
     * @param ProvidingObj $obj
     * @param Provider $provider
     * @param array $params
     */
    public function provide($obj, $provider, $params)
    {
        $methods = (isset($params['methods']) ? $params['methods'] : []);
        $vars = (isset($params['vars']) ? $params['vars'] : []);

        $obj->addProvider($provider, $methods, $vars);
    }
}