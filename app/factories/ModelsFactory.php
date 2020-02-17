<?php


namespace app\factories;


use app\BaseObj;
use engine\base\GroupModel;

class ModelsFactory extends MultiFactory
{
    /** @var $groups GroupModel[]|null */
    private $groups;

    public function __construct()
    {
        $this->groups = [];
        $this->groups['default'] = new GroupModel("default");
    }

    /**
     * @param $model_name
     * @param array $params
     * @param bool $register
     * @return \app\BaseObj|bool
     */
    public function createModel($model_name, $params = [], $register = true)
    {
        $model = "app\\models\\$model_name";
        $instance = new $model(...$params);

        //$instance = $this->create($model, $params, $model_name, $register);

        return ($register
            ? $this->groups['default']
                ->add($model_name, $instance, count($this->groups['default']->models))
            : $instance);
    }

    /**
     * @param $model_name
     * @param array $params
     * @param null $group
     * @param bool $register
     * @return \app\BaseObj
     */
    public function createIfNotExists($model_name, $params = [], $group = null, $register = true)
    {
        $model = "app\\models\\$model_name";

        if (!$model_obj = $this->searchModel($model_name, $params, $group, true))
            $model_obj = $this->create($model, $params, $model_name, $register);

        return $model_obj;
    }

    /**
     * @param $model_name
     * @param array $params
     * @param string $group
     * @param bool $only_one
     * @return BaseObj[]|BaseObj|bool|null
     */
    public function searchModel($model_name, $params = [], $group = 'default', $only_one = false)
    {
        return (isset($this->groups[$group])
            ? $this->groups[$group]->search($params, $model_name, $only_one)
            : false);
    }

    public function getGroup($name = 'default')
    {
        return (isset($this->groups[$name]) ? $this->groups[$name] : null);
    }

    /**
     * @param $group GroupModel
     */
    public function addGroup($group)
    {
        $this->groups[$group->id] = $group;
    }

    /*public function createSomeModels($model_name, $params, $items = "*", $group_id = null, $register = true)
    {
        $key = $model_name;
        $model_name .= "Model";
        $namespace = "app\\models\\$model_name";
        /!! @var $ref \ReflectionClass !/
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
            /!! @var $inst TableModel !/
            $inst = $ref->newInstanceWithoutConstructor();
            $inst->group($group_id);
            Model::setData($inst, $datum);

            $all_inst[] = $inst;
        }

        $this->instances[$model_name][$group_id] = $all_inst;

        return $this->searchModel($key, [], $group_id);
    }*/
}