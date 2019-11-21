<?php


namespace app\helpers;


use app\builders\SelectQueryBuilder;
use app\factories\Factory;

class Queries extends Helper
{
    public static function select(): SelectQueryBuilder
    {
        return Factory::builders()->createBuilder("SelectQuery");
    }
}