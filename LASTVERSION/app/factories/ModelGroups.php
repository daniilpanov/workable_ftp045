<?php


namespace app\factories;


use app\AdvancedObj;
use app\models\Model;

class ModelGroups extends Model
{
    public $name;

    public $models = [], $groups = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addModel($model, $id = null, $group = null)
    {
        $group = $this->getGroup($group);

        if ($id === null)
            $id = count($this->models);
        elseif (is_array($id))
            $id = $model->id;

        return $group->models[$id] = $model;
    }

    public function addGroup($group)
    {
        return $this->groups[$group->name] = $group;
    }

    public function getModel($id)
    {
        return isset($this->models[$id]) ? $this->models[$id] : null;
    }

    public function searchModel($name = null, $params = [], $only_one = false)
    {
        if (is_array($name) && count($name) <= 1)
            $name = array_shift($name);

        $needle_group = (is_array($name))
            ? $this->getGroup($name)
            : $this;

        $found_models = [];

        foreach ($needle_group->models as $id => $model)
        {
            $advanced = AdvancedObj::isAdvanced($model);

            $clazz = getClass($model);

            if ($clazz == $name
                && count(array_spec_diff($params,
                    get_object_vars(($advanced) ? $model->getBaseInstance() : $model)
                )) == 0)
            {
                if ($only_one)
                    return $model;
                $found_models[$id] = $model;
            }
        }

        return $found_models;
    }

    /**
     * @param $name array|null
     * @return ModelGroups|null
     */
    public function getGroup($name = null)
    {
        if (!$name)
            return $this;

        $needle_group = is_array($name) ? array_shift($name) : $name;

        return isset($this->groups[$needle_group]) ? $this->groups[$needle_group]->getGroup($name) : null;
    }
}