<?php

use app\factories\ModelGroups;
use app\factories\Models;


// ПОДКЛЮЧАЕМ БИБЛИОТЕКИ
require_once "libs/helpers.php";

// УСТАНАВЛИВАЕМ ДЕФОЛТНЫЕ ПРОСТРАНСТВА ИМЁН
Models::$root_namespace = "app\\models";
Models::addGroup(new ModelGroups('default'));

// --------------------
$app = \app\App::get();
// --------------------

// УСТАНАВЛИВАЕМ ПРОВАЙДЕРЫ ПО УМОЛЧАНИЮ
$providers = require_once "config/providing.php";

if ($providers)
{
    $prov_conf = $app->info['default_providers'];

    foreach ($providers as $classname => $provider)
        $prov_conf->addProviderTo($provider, $classname);
}

// УСТАНАВЛИВАЕМ ПРАВИЛА РОУТИНГА
if (is_file("config/routing.php"))
{
    $routing = (require_once "config/routing.php");
    $app->routingSetUp($routing);
}