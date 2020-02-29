<?php

define("PHP_HOME", $_SERVER['DOCUMENT_ROOT'] . "/panoff-design");
define("PHP_DOMAIN", "http://localhost/panoff-design/");

require_once PHP_HOME . "/lib/more-functions.php";

system_config("autoload");

\engine\root\Kernel::get()->start();
