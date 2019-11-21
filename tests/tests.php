<?php

define("PHP_HOME", $_SERVER['DOCUMENT_ROOT'] . "/LAST-FTP!!!");
define("PHP_DOMAIN", "http://localhost/LAST-FTP!!!");

require_once PHP_HOME . "/lib/more-functions.php";

system_config("autoload");

use app\helpers\HTMLHelper as HTML;

include_lib("helpers");
include_lib("debug");


HTML::begin("Hello", "ru");
HTML::head();
HTML::body()->main("HELLO, MY FRIEND!");
HTML::end();