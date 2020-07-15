<?php


namespace app;


use app\factories\Controllers;

class App
{
    const C_CONTINUE = "ConT", C_DIE = "DiE";
    private static $inst = false;

    public static function get()
    {
        return self::$inst;
    }


    // Exceptions routing
    public $exceptions_routing = [
    ];

    public function getExRouting($ex_class)
    {
        return (isset($this->info[$ex_class]) ? $this->info[$ex_class] : null);
    }

    public function setExRouting($ex_class, $controller, $method)
    {
        $this->info[$ex_class] = [$controller, $method];
    }

    private function callExMethod($ex_data)
    {
        if (!$ex_data)
            return self::C_DIE;

        $method = $ex_data[1];
        $controller = Controllers::getController($ex_data[0]);

        if (!method_exists($controller, $method))
            return false;

        $res = $controller->$method();

        if ($res !== self::C_CONTINUE && $res !== self::C_DIE)
            return self::C_DIE;

        return $res;
    }

    // Main current page info
    public $info = [
        'current_layout' => "guest"
    ];

    // Get an item of main current page info
    public function getInfo($item)
    {
        return (isset($this->info[$item]) ? $this->info[$item] : false);
    }

    public function setInfo($item, &$value)
    {
        $this->info[$item] = $value;
    }

    // "BACKEND"
    public function __construct()
    {
        self::$inst = $this;
        require_once "config/boot.php";
    }

    // "FRONTEND"
    public function run()
    {
        \app\factories\Models::createModel(
            "View",
            [
                [
                    'path' => "absolute",
                    'src' => "layouts/" . $this->getInfo("current_layout") . ".php"
                ]
            ])->render();
    }

    public function error(\Throwable $exception)
    {
        if (($res = $this->callExMethod($this->getExRouting(getClass($exception)))))
        {
            if ($res === self::C_CONTINUE)
                return;
        }

        require_once "config/error.php";
    }

    public function routingSetUp($routing)
    {

    }
}