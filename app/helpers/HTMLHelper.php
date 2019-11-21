<?php


namespace app\helpers;


use app\factories\Factory;
use app\builders\HTMLDocBuilder;

class HTMLHelper extends Helper
{
    /** @var $html_model HTMLDocBuilder|null */
    private static $html_model = null;

    public static function begin($title, $lng)
    {
        return self::$html_model = Factory::builders()->createBuilder("HTMLDoc", $title, $lng);
    }

    public static function head(): HTMLDocBuilder
    {
        return self::getDocModel()->createHead();
    }

    public static function body(): HTMLDocBuilder
    {
        return self::getDocModel()->renderHead()->createBody();
    }

    public static function end()
    {
        self::getDocModel()->renderBody()->init();
    }

    public static function getDocModel(): HTMLDocBuilder
    {
        return self::$html_model;
    }
}