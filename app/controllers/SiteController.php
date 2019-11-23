<?php


namespace app\controllers;


use app\commands\RenderCommands as Render;

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
        echo $_SESSION['lng'] = $this->lng = $lng;
    }

    public function page($page)
    {
        Render::render("debug", ['var2' => $page], "components");
    }

    public function index()
    {
        echo "Routing is working!..";
    }
}