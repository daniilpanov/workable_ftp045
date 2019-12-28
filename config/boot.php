<?php

mb_internal_encoding("UTF-8");

/** @var $Kernel \engine\root\Kernel */
global $Kernel;

// Подключавем функции-хелперы
include_lib("helpers");
// Booting
$Kernel->bootUrl(getUrl());
$Kernel->bootDatabase("localhost", "newftp", "php", "12345");
//$Kernel->bootDatabase("mysqlserver", "z159472_pn11", "z159472_pn11", "Nikolay4664P");
// и настройки роутера (с помощью регистрации событий)
system_config("router-setup");
// Старт роутинга
$Kernel->bootRouter();

//
\app\factories\Factory::models()
    ->createSomeModels(
        "Pages",
        ['language' => \engine\root\Kernel::get()->app()->language],
        "id, name, is_in_top",
        "menu"
    );