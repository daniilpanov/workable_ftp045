<?php


namespace engine\app\db;


use app\commands\DbCommands;
use engine\base\BaseObj;

abstract class QueryBuilder extends BaseObj
{
    protected $initialized = false;
    protected $sql;
    protected $templates = [];

    protected function addTemplate($name, $value)
    {
        if (isset($this->templates[$name]))
            $name = $this->addTemplate($name . "i", $value);
        $this->templates[$name] = $value;

        return $name;
    }

    public function getSql()
    {
        return ($this->initialized ? $this->sql : $this->init()->sql);
    }

    public function getSqlInfo()
    {
        return [
                'sql' => $this->getSql(),
                'templates' => $this->templates
            ];
    }

    public function query($fetch = true, $all = true)
    {
        $res = db()->query(
            $this->getSql(),
            ($this->templates ? $this->templates : null)
        );

        if ($fetch)
        {
            $res = ($all) ? $res->fetchAll() : $res->fetch();
        }

        return $res;
    }

    abstract public function init();
}