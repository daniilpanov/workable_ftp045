<?php


namespace app\helpers;


use app\factories\Factory;
use app\builders\HTMLDocBuilder;

class HTMLHelper extends Helper
{
    /** @var $html_model HTMLDocBuilder|null */
    private $html_model = null;

    public function begin($title, $lng): self
    {
        $this->html_model = Factory::models()->createIfNotExists("HTMLDocBuilder", ['title' => $title, 'lang' => $lng]);
        return $this;
    }

    public function head(): HTMLDocBuilder
    {
        return $this->getDocModel()->createHead();
    }

    public function body(): HTMLDocBuilder
    {
        return $this->getDocModel()->renderHead()->createBody();
    }

    public function end()
    {
        $this->getDocModel()->renderBody()->init();
    }

    public function getDocModel(): HTMLDocBuilder
    {
        return $this->html_model;
    }
}