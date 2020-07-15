<?php


namespace app\models;


use engine\base\Model;
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
        $this->setData(func_get_args());

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
            die($exception->getMessage() . "<p>" . $exception->getTraceAsString());
            // Logging
        }

        $this->query("SET NAMES :charset", ['charset' => $charset]);
    }

    public function query($sql, $templates = null)
    {
        try
        {
            if (is_array($templates))
            {
                $sth = $this->pdo->prepare($sql);
                if (!$sth->execute($templates))
                    return false;
                return $sth;
            }
            else
                return $this->pdo->query($sql);
        }
        catch (\PDOException $exception)
        {
            echo $exception->getMessage();
            return false;
            // And logging before returning
        }
    }
}