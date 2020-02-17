<?php


namespace app\models;


use engine\base\TableRecord as TR;
use app\helpers\Queries;

class Constants extends TR
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

    public function getTable()
    {
        return "constants";
    }

    public function where($name)
    {
        return [['col' => 'name', 'op' => '=', 'val' => $name]];
    }
}