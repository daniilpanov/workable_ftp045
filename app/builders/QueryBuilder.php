<?php


namespace app\builders;


abstract class QueryBuilder extends Builder
{
    protected $sql;

    public function getSql()
    {
        return ($this->initialized ? $this->sql : $this->init()->sql);
    }

    public function query(bool $fetch = true, bool $all = true)
    {

    }
}