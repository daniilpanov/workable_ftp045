<?php


namespace app\controllers;


use app\helpers\Url;
use engine\base\Controller;
use engine\baseOf\EventKernel;

class RouterController extends Controller
{
    public function route()
    {
        EventKernel::get()->runBy("Url", Url::getOnlyUri());
        EventKernel::get()->runBy("Get", $_GET);
        EventKernel::get()->runBy("Post", $_POST);
    }
}