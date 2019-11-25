<?php

/** @var $Kernel \engine\root\Kernel */
global $Kernel;

use app\builders\{GetEvBuilder as Get, PostEvBuilder as Post};
use app\controllers\SiteController;

Get::$default_controller = SiteController::class;
Post::$default_controller = SiteController::class;

/** @var $get_builder Get */
$get_builder = factory("builders")->createBuilder("GetEv");
/** @var $post_builder Post */
$post_builder = factory("builders")->createBuilder("PostEv");

//
//
$get = (function () use ($get_builder)
{
    return (clone $get_builder);
});
//
$post = (function () use ($post_builder)
{
    return (clone $post_builder);
});
//
$reg = (function ($builder) use ($Kernel)
{
    $Kernel->registerEvent($builder->init());
});

// Call to Kernel to method 'registerEvent' to set a request rule
// GET
$reg($get()->get("lng", "([a-z]+)")->method("lng"));
$reg($get()->method("index"));
$reg($get()->get("page", "reviews")->method("reviews"));
$reg($get()->get("page", "contacts")->method("contacts"));
$reg($get()->get("page", "([0-9]+)")->method("page"));
// POST
$reg($post()->model("Contacts")->post("contacts")->method("contactsSend"));
$reg($post()->model("Review")->post("review")->method("reviewSend"));