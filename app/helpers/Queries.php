<?php


namespace app\helpers;


use app\builders\InsertQueryBuilder;
use app\builders\SelectQueryBuilder;
use app\factories\Factory;

class Queries extends Helper
{
    public static function select()
    {
        return Factory::builders()->createBuilder("SelectQuery");
    }

    public static function insert()
    {
        return Factory::builders()->createBuilder("InsertQuery");
    }
}