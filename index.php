<?php

define("PHP_HOME", $_SERVER['DOCUMENT_ROOT'] . "/workable_ftp045/");
define("PHP_DOMAIN", "http://localhost/workable_ftp045/");

require_once PHP_HOME . "/lib/more-functions.php";

system_config("autoload");

\engine\root\Kernel::get()->start();
