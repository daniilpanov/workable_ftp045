<?php


namespace app\helpers;


use app\factories\Factory;
use app\models\HTMLDoc;

class HTMLHelper extends Helper
{
    /** @var $html_model HTMLDoc|null */
    private static $html_model = null;

    public static function begin($title, $lng)
    {
        return self::$html_model = Factory::models()->createModel("HTMLDoc", [$title, $lng]);
    }

    public static function head()
    {
        return self::getDocModel()->createHead();
    }

    public static function body($body_class = null)
    {
        return self::getDocModel()->renderHead()->createBody($body_class);
    }

    public static function end()
    {
        self::getDocModel()->renderBody()->init();
    }

    public static function getDocModel()
    {
        return self::$html_model;
    }
}