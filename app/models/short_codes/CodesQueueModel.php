<?php


namespace app\models\short_codes;


use app\models\Model;

class CodesQueueModel extends Model
{
    public $content;
    /** @var $changers ShortCodeModelBase[] */
    public $changers = [];

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function add(ShortCodeModelBase $code)
    {
        // ID of "Changer"
        $id = count($this->changers);
        // Добавляем "Changer"
        $this->changers[] = $code;
        // Ключ, под которым находится "Changer"
        return $id;
    }

    public function remove(int $id)
    {
        // Если указанного "Changer" не существует, возвращаем false
        if (!isset($this->changers[$id]))
            return false;

        // Если он существует, сохраняем его в tmp переменную,
        $deleted = $this->changers[$id];
        // удаляем
        unset($this->changers[$id]);
        // и возвращаем удалённый "Changer"
        return $deleted;
    }

    public function go()
    {
        // Перебираем все "Changers"
        foreach ($this->changers as $changer)
        {
            // Каждый должен найти свой Short-Code в контенте и заменить его
            $this->content = $changer->replaceCode($this->content);
        }
        // Возвращаем контент
        return $this->content;
    }
}