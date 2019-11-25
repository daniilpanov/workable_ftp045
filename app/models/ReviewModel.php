<?php


namespace app\models;


use app\helpers\Queries;

class ReviewModel extends Model
{
    public $name, $email, $rating, $content;

    public function __construct($data)
    {
        unset($data['review']);

        self::setData($this, $data);
    }

    public function save()
    {
        Queries::insert()->table("reviews")
            ->col("name")->col("email")->col("rating")->col("content")
            ->val($this->name)->val($this->email)->val($this->rating)->val($this->content)->query(false);
    }
}