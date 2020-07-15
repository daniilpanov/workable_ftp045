<?php

use app\App;

//
require_once "config/autoload.php";

//
try {
    (new App())->run();
} catch (Throwable $exception) {
    App::get()->error($exception);
}