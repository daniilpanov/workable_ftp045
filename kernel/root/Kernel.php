<?php


namespace engine\root;


use app\commands\DbCommands;
use app\commands\RouterCommands;
use app\factories\Factory;
use app\helpers\Url;
use app\models\AppModel;
use engine\baseOf\EventKernel;

class Kernel
{
    /** @var $app AppModel|null */
    private $app = null;

    public function app()
    {
        return (!$this->app
            ? ($this->app = Factory::models()->createModel("App", [], false))
            : $this->app);
    }

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

        show_view("main", "layouts");
    }

    public function registerEvent($requestEv)
    {
        EventKernel::get()->register($requestEv);
    }

    public function bootUrl($url)
    {
        Url::init(Factory::models()->createModel("Url", [$url]));
    }

    public function bootDatabase($host, $dbname, $user, $pass = null, $charset = "utf8")
    {
        DbCommands::init($host, $dbname, $user, $pass, $charset);
    }

    // Routing
    public function bootRouter()
    {
        RouterCommands::route();
    }
}