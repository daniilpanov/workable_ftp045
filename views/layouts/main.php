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
    // Stylesheets
    ->link("css/bootstrap/bootstrap.min.css", "stylesheet")
    //->link("css/bootstrap/bootstrap-grid.min.css", "stylesheet")
    //->link("css/bootstrap/bootstrap-reboot.min.css", "stylesheet")
    ->link("css/style.css", "stylesheet")
    ->link("css/content.css", "stylesheet")
    // JS Scripts
    ->script("js/jquery.min.js")
    //->script("js/bootstrap/bootstrap.bundle.min.js")
    ->script("js/bootstrap/bootstrap.min.js")
    //->script("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/esm/popper.min.js")
    ->script("js/myjs.js");

HTML::body("container-fluid")->header(function () {
        show_view("header", "components");
    })->main(function () {
        show_view("main", "components");
    })->footer(function () {
        show_view("footer", "components");
    });


HTML::end();