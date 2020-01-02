<?php


namespace app\controllers;

use app\commands\RenderCommands as Render;
use app\factories\Factory;
use app\helpers\MailHelper;
use app\models\ContactsModel;
use app\models\PagesModel;
use app\models\ReviewModel;

use engine\base\Controller;
use engine\base\GroupModel;
use engine\root\Kernel as K;

class SiteController extends Controller
{
    private $lng = "ru";
    public $mail_sent = null;

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
        $model = Factory::models()->createModel("Pages");
        $model->fromDB($page);

        if ($model->page_exists)
            Render::render("page", ['model' => $model]);
    }

    public function index()
    {
        K::get()->app()->description = "Главная страница сайта Panoff Design.
         Гарантия качества, стильные и современные решения, потрясающий дизайн - вот то, что отличает нас
         от остальных производителей. Вы легко можете связаться с нами, оставить отзыв, или посмотреть наши статьи,
         которые могут помочь Вам при выборе продукции и дизайна";
        K::get()->app()->keywords = "Главная, главная страница, panoff, design, дизайн, panoff-design, интерьер,
        стильные, недорого, премиум, лучшее, лестницы, мебель";
        K::get()->app()->title = "Главная страница";

        Render::render("home");
    }

    public function contacts()
    {
        K::get()->app()->description = "Наши контакты";
        K::get()->app()->keywords = "panoff, panoff design, лестницы, design контакты, обратная связь, feedback";
        K::get()->app()->title = "Контакты";

        Render::render("contacts");
    }

    public function reviews()
    {
        K::get()->app()->description = "Отзывы о нашем сайте и о нашей продукции";
        K::get()->app()->keywords = "panoff, panoff design, лестницы, design отзывы";
        K::get()->app()->title = "Отзывы";

        $models = Factory::models()->addGroup(
            GroupModel::createGroupFromDB(
                "reviews",
                "ReviewsModel",
                "*", ['limit' => [5]]
            )
        );
        Render::render("reviews", ['reviews' => $models]);
    }

    public function contactsSend(ContactsModel $model)
    {
        $this->mail_sent = MailHelper::mail(
            "memonik@inbox.ru", //"test-7yk75@mail-tester.com",
            explode("@", $model->email)[0] . "@panoff-design.ru", $model->email,
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