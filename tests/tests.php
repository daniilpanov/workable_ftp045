<?php

define("PHP_HOME", $_SERVER['DOCUMENT_ROOT'] . "/engine");
define("PHP_DOMAIN", "http://localhost/engine");

require_once PHP_HOME . "/lib/more-functions.php";

system_config("autoload");

include_lib("helpers");
include_lib("debug");


