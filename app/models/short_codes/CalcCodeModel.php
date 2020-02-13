<?php


namespace app\models\short_codes;


class CalcCodeModel extends ShortCodeModel
{
    public function getCode()
    {
        return "calc";
    }

    public function getReplacement($params = null)
    {

    }
}