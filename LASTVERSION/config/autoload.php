<?php

spl_autoload_register(function ($namespace)
{
    $path = str_replace("\\", DIRECTORY_SEPARATOR, $namespace) . ".php";

    if (is_file($path))
        require_once $path;
});