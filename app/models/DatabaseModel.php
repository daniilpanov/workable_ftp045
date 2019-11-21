<?php


namespace app\models;


use PDO;

class DatabaseModel extends Model
{
    public $host;
    public $db;
    public $user;
    public $pass;
    public $charset;
    /** @var $pdo PDO|false */
    public $pdo;

    public function __construct($host, $db, $user, $pass = null, $charset = "utf8")
    {
        self::setData($this, func_get_args());

        try
        {
            $this->pdo = new PDO(
                "mysql:host=$host;dbname=$db;charset=$charset",
                $user, $pass,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => true,
                ]);
        }
        catch (\PDOException $exception)
        {
            $this->pdo = false;
            // Logging
        }
    }
}