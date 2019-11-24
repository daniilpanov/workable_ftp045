<?php


namespace app\controllers;

use app\commands\RenderCommands as Render;
use app\factories\Factory;
use engine\root\Kernel;

class SiteController extends Controller
{
    private $lng = "ru";

    public function boot()
    {
        
    }
    
    public function anAction()
    {
        
    }

    public function lng($lng)
    {
        $_SESSION['lng'] = Kernel::get()->app()->language = $this->lng = $lng;
    }

    public function page($page)
    {
        //Render::render("debug", ['var2' => $page], "components");

        $model = Factory::models()->createModel("Pages", [$page, Kernel::get()->app()->language]);
        if ($model->page_exists)
            Render::render("page", ['model' => $model]);
    }

    public function index()
    {
        Render::render("home");
    }

    public function contacts()
    {
        Render::render("contacts");
    }

    public function reviews()
    {
        Render::render("reviews");
    }

    public function contactsSend()
    {
        echo "ok";
    }
}