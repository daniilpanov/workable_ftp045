<?php


namespace engine\base;


use app\helpers\Queries;

abstract class TableModel extends BaseObjModel
{
    public function fromDB($id)
    {
        $this->setData(
            Queries::select()
                ->selectString("*")
                ->from($this->getTable())
                ->where("id", $id)
                ->query(true, false)
        );
    }

    abstract public function getTable();
}