<?php

namespace app\models\short_codes;


use engine\root\Kernel as K;

/** @var $model \app\models\PagesModel */
//
K::get()->app()->description = $model->description;
K::get()->app()->keywords = $model->keywords;
K::get()->app()->title = $model->title;

//
$queue = new CodesQueueModel($model->content);
//
$queue->add(new HintCodeWIModel());
$queue->add(new CalcCodeModel());
$queue->add(new FrameCodeWIModel());
$queue->add(new FrameItemCodeWIModel());
$queue->add(new SliderCodeModel());
//
$model->insertBaseShortCodes($queue);

//
print ($model->content);