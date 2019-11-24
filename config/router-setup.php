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

// Call to Kernel to method 'registerEvent' to set a request rule
// GET
$Kernel->registerEvent((clone $get_builder)->get("lng", "([a-z]+)")->method("lng")->init());
$Kernel->registerEvent((clone $get_builder)->method("index")->init());
$Kernel->registerEvent((clone $get_builder)->get("page", "reviews")->method("reviews")->init());
$Kernel->registerEvent((clone $get_builder)->get("page", "contacts")->method("contacts")->init());
$Kernel->registerEvent((clone $get_builder)->get("page", "([0-9]+)")->method("page")->init());
// POST
$Kernel->registerEvent((clone $post_builder)->post("contacts")->method("contactsSend")->init());