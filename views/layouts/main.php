<?php

use app\helpers\HTMLHelper as HTML;
use engine\root\Kernel;

HTML::begin(
    Kernel::get()->app()->title,
    Kernel::get()->app()->language
);

HTML::head()
    // Meta
    ->meta("Description", Kernel::get()->app()->description)
    ->meta("Keywords", Kernel::get()->app()->keywords)
    ->meta(null, "text/html; charset=utf-8", "Content-Type")
    ->meta("msapplication-config", "files/browser/browserconfig.xml")
    ->meta("robots", "all")
    ->meta("yandex-verification", "96b6f404021da706")
    // Stylesheets
    ->link((is_v3() ? "" : "v3/") . "css/bootstrap/bootstrap.min.css", "stylesheet")
    //->link("css/bootstrap/bootstrap-grid.min.css", "stylesheet")
    //->link("css/bootstrap/bootstrap-reboot.min.css", "stylesheet")
    ->link((is_v3() ? "" : "v3/") . "css/stars.css", "stylesheet")
    ->link((is_v3() ? "" : "v3/") . "css/style.css", "stylesheet")
    ->link((is_v3() ? "" : "v3/") . "css/content.css", "stylesheet")
    ->link((is_v3() ? "" : "v3/") . "files/browser/favicon.png", "icon", "image/x-icon")
    // JS Scripts
    ->script((is_v3() ? "" : "v3/") . "js/jquery.min.js")
    //->script((is_v3() ? "" : "v3/") . "js/bootstrap/bootstrap.bundle.min.js")
    ->script((is_v3() ? "" : "v3/") . "js/bootstrap/bootstrap.min.js")
    //->script("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/esm/popper.min.js")
    ->script((is_v3() ? "" : "v3/") . "js/rating.js")
    ->script((is_v3() ? "" : "v3/") . "js/myjs.js");

HTML::body("container-fluid")->header(function () {
        show_view("header", "components");
    })->main(function () {
        show_view("main", "components");
    })->footer(function () {
        show_view("footer", "components");
    });


HTML::end();