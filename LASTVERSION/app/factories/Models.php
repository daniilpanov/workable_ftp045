<?php


namespace app\factories;


use app\AdvancedObj;
use app\App;
use app\BaseObj;

final class Models extends BaseObj
{
    private static $models;
    public static $groups;
    public static $root_namespace = null;
    public static $providing = true;

    private static function getModelNSC($model, $p = true)
    {
        if (is_object($model))
            return get_class($model);

        return ($p ? "\\" : "") . (self::$root_namespace
            ? self::$root_namespace . "\\" . $model
            : $model);
    }

    public static function addModel($obj)
    {
        if (!self::$models)
            self::$models = [];

        if (AdvancedObj::isAdvanced($obj))
            $obj2 = $obj->getBaseInstance();
        else
            $obj2 = $obj;

        if (!isset(self::$models[getLastClass(self::getModelNSC($obj2, false))]))
            self::$models[getLastClass(self::getModelNSC($obj2, false))] = [];

        return self::$models[getLastClass(self::getModelNSC($obj2, false))][$obj->id] = $obj;
    }

    public static function createModel($modelname, $params = [])
    {
        $groups = explode(".", $modelname);
        $modelNSC = self::getModelNSC(end($groups));
        $c = count($groups) - 1;
        unset($groups[$c]);
        $params = (array) $params;

        if ($c < 1)
        {
            $groups = null;
            $curr = 'default';
        }
        else
            $curr = array_shift($groups);

        if (!isset(self::$groups[$curr]))
            self::$groups[$curr] = new ModelGroups($curr);

        if (self::$providing)
        {
            $model = new AdvancedObj(new $modelNSC(...$params));
            $providers = App::get()->getInfo("default_providers")->forClass($modelNSC);

            foreach ($providers as $provider)
                $model->addProvider(Providers::addProvider($provider));
        }
        else
            $model = new $modelNSC(...$params);

        $id = ($model->id ? $model->id : null);

        return self::$groups[$curr]->addModel($model, $id, ($groups ? $groups : null));
    }

    /*public static function createModel($modelname, $params = null)
    {
        $params = (array) $params;
        $modelNSC = self::getModelNSC($modelname);

        if (self::$providing)
        {
            $model = new AdvancedObj(new $modelNSC(...$params));
            $providers = App::get()->getInfo("default_providers")->forClass($modelNSC);

            foreach ($providers as $provider)
                $model->addProvider(Providers::addProvider($provider));
        }
        else
            $model = new $modelNSC(...$params);

        return self::addModel($model);
    }*/

    public static function addGroup($group)
    {
        return self::$groups[$group->name] = $group;
    }

    public static function searchModel($name, $params = [], $only_one = false)
    {
        $arr_name = explode(".", $name);

        if (($c = count($arr_name)) > 1)
        {
            $group = array_shift($arr_name);

            return isset(self::$groups[$group])
                ? self::$groups[$group]
                    ->searchModel($arr_name, $params, $only_one)
                : false;
        }

        return self::$groups['default']->searchModel($name, $params, $only_one);
    }

    public static function createModelIfNotExists($name, $params = [])
    {
        if (!$model = self::searchModel($name, $params, true))
            $model = self::createModel($name, $params);

        return $model;
    }

    public function getGroup($name = 'default')
    {
        $groups = explode(".", $name);
        $curr = array_shift($groups);

        return isset($this->groups[$curr])
            ? self::$groups[$curr]->getGroup($groups)
            : null;
    }
}