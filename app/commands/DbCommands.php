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
            {
                $sth = $this->inst->pdo->prepare($sql);
                if (!$sth->execute($templates))
                    return false;
                return $sth;
            }
            else
                return $this->inst->pdo->query($sql);
        }
        catch (\PDOException $exception)
        {
            echo $exception->getMessage();
            return false;
            // And logging before returning
        }
    }

    public function pagesSortC($id = 0)
    {
        $result = [];
        $pages = Factory::models()->searchModel("Pages", ['parent' => $id], "menu");

        if ($pages)
        {
            foreach ($pages as $item)
            {
                if ($tmp = $this->pagesSortC($item->id))
                    $result[] = ['parent' => $item, 'submenu' => $tmp];
                else
                    $result[] = $item;
            }
        }

        return $result;
    }
}