<?php


namespace app\models;


abstract class TableModel extends Model
{
    abstract public static function getKeyCols();

    abstract public static function getMultiQuery($params): string;
}