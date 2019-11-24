<?php

/** @var $Kernel \engine\root\Kernel */
global $Kernel;

// Подключавем функции-хелперы
include_lib("helpers");
// Booting
$Kernel->bootUrl(getUrl());
$Kernel->bootDatabase("localhost", "newftp", "php", "12345");
// и настройки роутера (с помощью регистрации событий)
system_config("router-setup");
// Старт роутинга
$Kernel->bootRouter();