<?php

define("PHP_HOME", $_SERVER['DOCUMENT_ROOT'] . "/LAST-FTP!!!");
define("PHP_DOMAIN", "http://localhost/LAST-FTP!!!");

require_once PHP_HOME . "/lib/more-functions.php";

system_config("autoload");

\engine\root\Kernel::get()->start();
