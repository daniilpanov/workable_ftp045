<?php


namespace engine\app\db;


class InsertQueryBuilder extends QueryBuilder
{
    public $table, $cols;

    public function table($table)
    {
        $this->table = $table;

        return $this;
    }

    public function col($name)
    {
        $this->cols[] = $name;

        return $this;
    }

    public function val($value)
    {
        $this->addTemplate("i", $value);

        return $this;
    }

    public function init()
    {
        $this->sql = "INSERT INTO "
            . $this->table
            . "("
                . implode(", ", $this->cols)
            . ") VALUE (:"
                . implode(", :", array_keys($this->templates))
            . ")";

        return $this;
    }
}