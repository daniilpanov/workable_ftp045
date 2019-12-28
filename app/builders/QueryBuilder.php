<?php


namespace app\builders;


use app\commands\DbCommands;

abstract class QueryBuilder extends Builder
{
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
        return ($this->templates)
            ? [
                'sql' => $this->getSql(),
                'templates' => $this->templates
            ] : $this->getSql();
    }

    public function query($fetch = true, $all = true)
    {
        $res = DbCommands::query(
            $this->getSql(),
            ($this->templates ? $this->templates : null)
        );

        if ($fetch)
        {
            $res = ($all) ? $res->fetchAll() : $res->fetch();
        }

        return $res;
    }
}