<?php


namespace app\models;


use app\helpers\Queries;

class ReviewsModel extends TableModel
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
}