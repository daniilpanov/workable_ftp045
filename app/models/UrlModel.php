<?php


namespace app\models;


use engine\base\Model;

class UrlModel extends Model
{
    public $full_url;
    public $scheme;
    public $host;
    public $user;
    public $pass;
    public $path;
    public $query;
    public $fragment;

    public function __construct($url)
    {
        self::setData($this, parse_url($url));
        $this->full_url = $url;
    }

    public static function getKeyCols()
    {
        return ['path', 'query', 'fragment', 'user', 'pass'];
    }
}