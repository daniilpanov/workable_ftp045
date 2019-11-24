<?php


namespace app\factories;


use app\BaseObj;
use app\commands\DbCommands;
use app\models\Model;
use app\models\TableModel;

class ModelsFactory extends MultiFactory
{
    /**
     * @param $model_name
     * @param array $params
     * @param bool $register
     * @return \app\BaseObj|\app\ProvidingObj
     */
    public function createModel($model_name, $params = [], $register = true)
    {
        $model_name .= "Model";
        $model = "app\\models\\$model_name";

        $instance = $this->create($model, $params, $model_name, $register);

        return $instance;
    }

    /**
     * @param $model_name
     * @param array $params
     * @param null $group
     * @param bool $register
     * @return \app\BaseObj|\app\ProvidingObj
     */
    public function createIfNotExists($model_name, $params = [], $group = null, $register = true)
    {
        $model_name .= "Model";
        $model = "app\\models\\$model_name";

        if (!$model_obj = $this->searchModel($model_name, $params, $group, true))
            $model_obj = $this->create($model, $params, $model_name, $register);

        return $model_obj;
    }

    /**
     * @param $model_name
     * @param array $params
     * @param null $group
     * @param bool $only_one
     * @return BaseObj[]|BaseObj
     */
    public function searchModel($model_name, $params = [], $group = null, $only_one = false)
    {
        $model_name .= "Model";

        return $this->search($model_name, $params, $group, $only_one);
    }

    public function createSomeModels($model_name, $params, $items = "*", $group_id = null, $register = true)
    {
        $key = $model_name;
        $model_name .= "Model";
        $namespace = "app\\models\\$model_name";
        /** @var $ref \ReflectionClass */
        $ref = Factory::reflection()->getRef($namespace);

        foreach ($namespace::getKeyCols() as $col)
        {
            if (!isset($params[$col]))
                return false;
        }
        $query = $namespace::getMultiQuery($params, $items);

        if (is_array($query) && isset($query['templates']))
            $data = DbCommands::query($query['sql'], $query['templates']);
        else
            $data = DbCommands::query($query);

        $data = $data->fetchAll();
        $all_inst = [];

        foreach ($data as $datum)
        {
            /** @var $inst TableModel */
            $inst = $ref->newInstanceWithoutConstructor();
            $inst->group($group_id);
            Model::setData($inst, $datum);

            $all_inst[] = $inst;
        }

        $this->instances[$model_name][$group_id] = $all_inst;

        return $this->searchModel($key, [], $group_id);
    }
}