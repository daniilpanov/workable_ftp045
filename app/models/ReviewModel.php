<?php


namespace app\models;


use app\helpers\Queries;

class ReviewModel extends \engine\base\Model
{
    public $name, $email, $rating, $content, $created, $mods = null;

    public function __construct($data)
    {
        unset($data['review']);
        $this->setData($data);

        $this->created = time();
    }

    public function save()
    {
        Queries::insert()->table("reviews")
            ->col("name")->col("email")->col("rating")->col("content")->col("created")
            ->val($this->name)->val($this->email)->val($this->rating)->val($this->content)->val($this->created)
            ->query(false);
    }
}