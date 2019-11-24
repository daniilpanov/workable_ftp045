<?php


namespace app\models;


use app\helpers\Queries;

class ConstantsModel extends TableModel
{
    public $id, $name, $value, $translate;

    public static function getKeyCols()
    {
        return ['name'];
    }

    public static function getMultiQuery($params, $items = "*")
    {
        return Queries::select()->selectString($items)
            ->from("constants")->where("name", $params['name'])->getSqlInfo();
    }
}