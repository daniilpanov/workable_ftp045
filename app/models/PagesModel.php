<?php


namespace app\models;


use app\helpers\Queries;
use engine\root\Kernel;

class PagesModel extends TableModel
{
    public $id, $name, $content,
        $language, $keywords,
        $description, $position, $title, $page_exists;

    public function __construct($id, $language)
    {
        self::setData($this, Queries::select()
            ->from("pages")->where("id", intval($id))
            ->and("language", $language)->order("position")->query(true, false));

        $this->page_exists = isset($this->id);

        if ($this->page_exists)
        {
            $app = Kernel::get()->app();
            $app->page = $id;
            $app->keywords = $this->keywords;
            $app->description = $this->description;
            $app->title = $this->title;
        }
    }

    public static function getKeyCols()
    {
        return ['language'];
    }

    /**
     * @param $params
     * @param string $items
     * @return array|string
     */
    public static function getMultiQuery($params, $items = "*")
    {
        return Queries::select()->selectString($items)
            ->from("pages")
            ->where("language", $params['language'])
            ->and("id", (isset($params['id']) ? $params['id'] : []))
            ->order("position")
            ->getSqlInfo();
    }
}