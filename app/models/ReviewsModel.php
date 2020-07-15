<?php


namespace app\models;


use app\helpers\Queries;

class ReviewsModel extends \engine\base\TableRecord
{
    public $name, $email, $rating, $content, $created, $mods;

    public static function getKeyCols()
    {
        return [];
    }

    public static function getMultiQuery($params, $items = "*")
    {
        return Queries::select()->selectString($items)
            ->from("reviews")->order("created", "desc")->getSqlInfo();
    }

    public function getTable()
    {
        return "reviews";
    }
}