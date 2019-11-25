<?php


namespace app\controllers;

use app\commands\RenderCommands as Render;
use app\factories\Factory;
use app\helpers\MailHelper;
use app\models\ContactsModel;
use app\models\ReviewModel;
use engine\root\Kernel;

class SiteController extends Controller
{
    private $lng = "ru";

    public function boot()
    {
        
    }
    
    public function anAction()
    {
        
    }

    public function lng($lng)
    {
        $_SESSION['lng'] = Kernel::get()->app()->language = $this->lng = $lng;
    }

    public function page($page)
    {
        //Render::render("debug", ['var2' => $page], "components");

        $model = Factory::models()->createModel("Pages", [$page, Kernel::get()->app()->language]);
        if ($model->page_exists)
            Render::render("page", ['model' => $model]);
    }

    public function index()
    {
        Render::render("home");
    }

    public function contacts()
    {
        Render::render("contacts");
    }

    public function reviews()
    {
        $models = Factory::models()->createSomeModels("Reviews", ['limit' => 5], "*", "reviews");
        Render::render("reviews", ['reviews' => $models]);
    }

    public function contactsSend(ContactsModel $model)
    {
        MailHelper::mail(
            "memonik@inbox.ru",
            $model->email, $model->email,
            (isset($model->subject)
                ? $model->subject
                : "Сообщение с сайта panoff-design.ru"
            ), $model->message
        )->send();
    }

    public function reviewSend(ReviewModel $model)
    {
        $model->save();
    }
}