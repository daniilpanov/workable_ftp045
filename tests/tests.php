<?php

define("PHP_HOME", $_SERVER['DOCUMENT_ROOT'] . "/LAST-FTP!!!");
define("PHP_DOMAIN", "http://localhost/LAST-FTP!!!");

require_once PHP_HOME . "/lib/more-functions.php";

system_config("autoload");

use app\helpers\MailHelper as Mail;

include_lib("helpers");
include_lib("debug");


/** @var $model \app\models\MailModel */
$model = Mail::mail(
    $_POST['to'],
    $_POST['from'],
    $_POST['reply-to'],
    $_POST['subject'],
    $_POST['message'],
    (!empty($_FILES['attachments']) ? $_FILES['attachments'] : null)
);

$model->send();