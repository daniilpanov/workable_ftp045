<?php


namespace app\models;


use engine\base\Model;

class App extends Model
{
    public $language = "ru",
        $page = "index",
        $description = "Index page",
        $keywords = "index, page",
        $title = "Main page";
}