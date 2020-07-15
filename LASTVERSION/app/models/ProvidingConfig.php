<?php


namespace app\models;


class ProvidingConfig extends Model
{
    public $prov_conf = [];

    public function addProviderTo($provider_name, $clazz, ...$params)
    {
        if (!isset($this->prov_conf[$clazz]))
            $this->prov_conf[$clazz] = [];

        $this->prov_conf[$clazz][] = [$provider_name, $params];
    }

    public function forClass($classname)
    {
        return (isset($this->prov_conf[$classname]) ? $this->prov_conf[$classname] : []);
    }
}