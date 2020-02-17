<?php


namespace engine\base;


use app\helpers\Queries;

abstract class TableRecord extends Model
{
    public $id;
    public $group;

    public function save()
    {
        if ($this->id)
        {
            $query = Queries::update()
                ->table($this->getTable());
        }
        else
        {
            $query = Queries::insert()
                ->table($this->getTable());

            $cols = get_object_vars($this);
            unset($cols['group'], $cols['id']);

            foreach ($cols as $col => $value)
            {
                $query->col($col)->val($value);
            }
        }

        return $query->init();
    }

    public function fromDB()
    {
        $this->setData(
            Queries::select()
                ->selectString("*")
                ->from($this->getTable())
                ->where("id", $this->id)
                ->query(true, false)
        );
    }

    public function delete()
    {
        // TODO: delete DB query (by id)
    }

    abstract public function getTable();
}