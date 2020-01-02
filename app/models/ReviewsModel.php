<?php


namespace app\models;


use app\helpers\Queries;

class ReviewsModel extends \engine\base\TableModel
{
    public $id, $name, $email, $rating, $content;

    public static function getKeyCols()
    {
        return ['limit'];
    }

    public static function getMultiQuery($params, $items = "*")
    {
        return Queries::select()->selectString($items)
            ->from("reviews")->limit($params['limit'])->getSqlInfo();
    }

    public function getTable()
    {
        return "reviews";
    }

    public function limit($limit)
    {
        return [$limit];
    }
}