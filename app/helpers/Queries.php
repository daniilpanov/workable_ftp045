<?php


namespace app\helpers;


use engine\app\db\InsertQueryBuilder;
use engine\app\db\SelectQueryBuilder;
use engine\app\db\UpdateQueryBuilder;

class Queries extends Helper
{
    /**
     * @return SelectQueryBuilder
     */
    public static function select()
    {
        return new SelectQueryBuilder();
    }

    /**
     * @return InsertQueryBuilder
     */
    public static function insert()
    {
        return new InsertQueryBuilder();
    }

    /**
     * @return UpdateQueryBuilder
     */
    public static function update()
    {
        return new UpdateQueryBuilder();
    }
}