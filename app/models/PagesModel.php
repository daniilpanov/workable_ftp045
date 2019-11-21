<?php


namespace app\models;


use app\helpers\Queries;

class PagesModel extends TableModel
{
    public $id, $name, $content;

    public function __construct($data)
    {
        self::setData($this, $data);
    }

    public static function getKeyCols()
    {
        return ['id', 'language'];
    }

    public static function getMultiQuery($params): string
    {
        return Queries::select()->select("*")
            ->from("pages")
            ->where("id", $params['id'])
            ->and("language", $params['language'])
            ->getSql();
    }
}