<?php


namespace engine\root;


use app\commands\RouterCommands;
use app\factories\Factory;
use app\helpers\Url;
use engine\baseOf\EventKernel;

class Kernel
{
    private static $instance = null;

    public static function get(): self
    {
        if (self::$instance === null)
        {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function start()
    {
        //
        $GLOBALS['Kernel'] = $this;
        // Boot
        system_config("boot");

        //

        //
        Url::init(Factory::models()->createModel("Url", [getUrl()]));
        // Routing
        RouterCommands::route();

        show_view("main", "layouts");
    }

    public function registerEvent($requestEv)
    {
        EventKernel::get()->register($requestEv);
    }
}