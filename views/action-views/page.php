<?php

use engine\root\Kernel as K;

/** @var $model \app\models\PagesModel */
//
K::get()->app()->description = $model->description;
K::get()->app()->keywords = $model->keywords;
K::get()->app()->title = $model->title;

//
print ($model->content);