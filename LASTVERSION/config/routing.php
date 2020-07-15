<?php

use app\controllers as c;

return [
    'default' => [
        'controller' => [
            'url' => c\UrlControl::class,
            'get' => c\GetControl::class,
            'post' => c\PostControl::class,
            'user' => c\UsersControl::class
        ],
        'methods-suffix' => "Action",
        'error' => "config/error.php",
    ],
    'exceptions' => [
    ],
];