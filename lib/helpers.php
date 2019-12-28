<?php

function getUrl()
{
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    return $url;
}

function global_factory()
{
    return \app\factories\Factory::class;
}

function factory($factory)
{
    return \app\factories\Factory::$factory();
}