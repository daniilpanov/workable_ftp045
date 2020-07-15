<?php


namespace app\models\short_codes;


class HintCodeWIModel extends ShortCodeWithInnerModel
{
    private $_page;
    private $_id = 0;

    public function __construct()
    {
        if (!isset($_GET['page']))
            $this->_page = 0;
        else
            $this->_page = $_GET['page'];
    }

    public function getCode()
    {
        return "hint";
    }

    public function getReplacement($params = null)
    {
        if (!isset($params['content']))
            return false;

        $id = $this->_page . "-" . $this->_id;
        $this->_id ++;

        if (isset($_COOKIE['hint' . $id]) && $_COOKIE['hint' . $id] == 'false')
            return "";

        $text = $params['content'];
        return "<div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
    <button type=\"button\" class=\"close close-n-cache\" data-dismiss=\"alert\" aria-label=\"Close\" id='$id'>
        <span aria-hidden=\"true\">&times;</span>
    </button>
    <p>$text</p>
</div>";
    }
}