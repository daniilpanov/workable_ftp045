<?php

/** @var $Kernel \engine\root\Kernel */
global $Kernel;

//
use app\helpers\GetRouting as Get;
use app\helpers\PostRouting as Post;
use app\controllers\AdminActionsController;
use app\controllers\GuestActionsController;

//
Get::$default_controller =
    Post::$default_controller =
        (!@$_SESSION['user'])
            ? GuestActionsController::class
            : AdminActionsController::class;

//
$get_builder = new Get();
$post_builder = new Post();

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
// GUEST URL
if (!@$_SESSION['user'])
{

}
// ADMIN URL
else
{

}

// GUEST GET
if (!@$_SESSION['user'])
{
    $reg($get()->get("lng", "([a-z]+)")->method("lng"));
    $reg($get()->method("index"));
    $reg($get()->get("page", "reviews")->method("reviews"));
    $reg($get()->get("page", "contacts")->method("contacts"));
    $reg($get()->get("page", "([0-9]+)")->method("page"));
}
// ADMIN GET
else
{

}
// GUEST POST
if (!@$_SESSION['user'])
{
    $reg($post()->model("ContactsModel")->post("contacts")->method("contactsSend"));
    $reg($post()->model("ReviewModel")->post("review")->method("reviewSend"));
}
// ADMIN POST
else
{

}