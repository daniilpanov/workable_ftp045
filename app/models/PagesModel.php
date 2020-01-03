<?php


namespace app\models;


use app\helpers\Queries;
use app\helpers\Url;
use engine\root\Kernel;

class PagesModel extends \engine\base\TableModel
{
    public $id, $parent, $name, $content,
        $language, $keywords,
        $description, $position, $title, $is_link, $page_exists;

    public function fromDB($id)
    {
        $this->setData(Queries::select()
            ->from("pages")->where("id", intval($id))
            ->query(true, false));

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

    public function where($lng)
    {
        return [['col' => 'language', 'op' => '=', 'val' => $lng]];
    }

    public function order()
    {
        return ['position', 'ASC'];
    }

    public function getTable()
    {
        return "pages";
    }
}