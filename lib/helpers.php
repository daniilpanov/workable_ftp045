<?php

//
function getUrl()
{
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    return $url;
}

function global_factory()
{
    return \app\factories\Factory::class;
}

function factory($factory)
{
    return \app\factories\Factory::$factory();
}

function controller($controller)
{
    return factory("controllers")->getController($controller);
}

function dbInit($host, $db, $user, $pass = null, $charset = "utf8")
{
    global $db_inst;
    return $db_inst = factory("models")
        ->createIfNotExists("DatabaseModel",
            [
                $host, $db, $user, $pass, $charset
            ]);
}

function db()
{
    global $db_inst;
    return $db_inst;
}