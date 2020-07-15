<?php


namespace app\providers;


use app\BaseObj;

abstract class Provider extends BaseObj
{
    const TYPE_METHOD_CALL = "methodCall", TYPE_VAR_GET = "varGet", TYPE_VAR_SET = "varSet";
    const DENY = "DN", STOP = "BrK", NO_SKIP = "N_SkP", OK = "OK";

    public $ID = null;
    public $options = [];

    protected function create($type = self::TYPE_METHOD_CALL, $for = "*")
    {
        $this->options = ["type" => $type, "for" => $for];
    }

    public function init($id)
    {
        $this->ID = $id;
    }

    public function provide($what, $name, &$value_s)
    {
        $res = null;
        $method = $name . ucfirst($what) . "Provide";
        $method2 = $what . "ProvideAll";

        if (method_exists($this, $method))
            if (($code = $this->callProviderMethod($method, $value_s)) === self::STOP)
                return self::STOP;

        if (method_exists($this, $method2) && (!isset($code) || $code == self::NO_SKIP))
            if (($code = $this->$method2($name, $value_s)) === self::STOP)
                return self::STOP;

        return (isset($code) && $code ? $code : self::OK);
    }

    private function callProviderMethod($method, &$data)
    {
        if (is_null($data))
            return $this->$method();
        elseif (is_array($data))
            return $this->$method(...$data);
        else
            return $this->$method($data);
    }
}