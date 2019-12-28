<?php


namespace app\models;


use app\helpers\Queries;
use app\helpers\Url;
use engine\root\Kernel;

class PagesModel extends TableModel
{
    public $id, $name, $content,
        $language, $keywords,
        $description, $position, $title, $is_in_top, $page_exists;

    public function __construct($id, $language)
    {
        self::setData($this, Queries::select()
            ->from("pages")->where("id", intval($id))
            ->wand("language", $language)->order("position")->query(true, false));

        $this->page_exists = isset($this->id);

        if ($this->page_exists)
        {
            if (!is_v3())
                $this->content = str_replace('src="files/', 'src="v3/files/', $this->content);
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
            ->wand("id", (isset($params['id']) ? $params['id'] : []))
            ->order("position")
            ->getSqlInfo();
    }
}