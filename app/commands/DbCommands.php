<?php


namespace app\commands;


use app\factories\Factory;
use app\models\DatabaseModel;

class DbCommands extends Command
{
    /** @var $inst DatabaseModel|null */
    private $inst = null;

    public function initC($host, $db, $user, $pass = null, $charset = "utf8")
    {
        $args = func_get_args();
        if (!isset($args[3]))
            $args[3] = $pass;
        if (!isset($args[4]))
            $args[4] = $charset;

        $this->inst = Factory::models()->createModel("Database", $args);
        $this->queryC("SET NAMES :charset", ['charset' => $charset]);
    }

    public function queryC($sql, $templates = null)
    {
        try
        {
            if (is_array($templates))
                return $this->inst->pdo->prepare($sql)->execute($templates);
            else
                return $this->inst->pdo->query($sql);
        }
        catch (\PDOException $exception)
        {
            return false;
            // And logging before returning
        }
    }
}