<?php


namespace app\controllers;

use app\commands\RenderCommands as Render;
use app\factories\Factory;
use app\helpers\MailHelper;
use app\models\ContactsModel;
use app\models\PagesModel;
use app\models\ReviewModel;
use engine\root\Kernel as K;

class SiteController extends Controller
{
    private $lng = "ru";

    public function __construct()
    {
        $this->lng = isset($_COOKIE['lng']) ? $_COOKIE['lng'] : "ru";
    }
    
    public function anAction()
    {
        
    }

    public function lng($lng)
    {
        $_COOKIE['lng'] = K::get()->app()->language = $this->lng = $lng;
    }

    public function page($page)
    {
        //Render::render("debug", ['var2' => $page], "components");
        /** @var $model PagesModel */
        $model = Factory::models()->createModel("Pages", [$page, K::get()->app()->language]);

        if ($model->page_exists)
            Render::render("page", ['model' => $model]);
    }

    public function index()
    {
        K::get()->app()->description = "";
        K::get()->app()->keywords = "";
        K::get()->app()->title = "Главная страница";

        Render::render("home");
    }

    public function contacts()
    {
        K::get()->app()->description = "";
        K::get()->app()->keywords = "";
        K::get()->app()->title = "Контакты";

        Render::render("contacts");
    }

    public function reviews()
    {
        K::get()->app()->description = "";
        K::get()->app()->keywords = "";
        K::get()->app()->title = "Отзывы";

        $models = Factory::models()->createSomeModels("Reviews", ['limit' => 5], "*", "reviews");
        Render::render("reviews", ['reviews' => $models]);
    }

    public function contactsSend(ContactsModel $model)
    {
        function email()
        {

        }

        MailHelper::mail(
            "memonik@inbox.ru", //"test-7yk75@mail-tester.com",
            $model->email, $model->email,
            ($model->subject
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