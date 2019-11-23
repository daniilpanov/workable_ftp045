<?php

use app\helpers\HTMLHelper as HTML;

HTML::begin("Hello", "ru");
HTML::head();
HTML::body()->header(function () {
        show_view("header", "components");
    })->main(function () {
        show_view("main", "components");
    });
HTML::end();