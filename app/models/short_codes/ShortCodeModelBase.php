<?php


namespace app\models\short_codes;


interface ShortCodeModelBase
{
    // Медод, возвращающий short-code
    public function getCode();

    // Метод, возвращающий значение short-code
    public function getReplacement($params = null);

    // Метод замены short-code на его значение
    public function replaceCode($content);
}