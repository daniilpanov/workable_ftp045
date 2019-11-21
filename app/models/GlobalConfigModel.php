<?php

namespace app\models;


class GlobalConfigModel extends Model
{
    // Server
    public $host;
    public $charset;
    // Client
    public $language;
    public $user;
    public $password;
    public $first_second_last_names;
    // Db
    public $dbname;
    public $dbhost;
    public $dbuser;
    public $dbpass;
    public $dbcharset;

    public function __construct($params = [])
    {
        self::setData($this, $params);
    }
}