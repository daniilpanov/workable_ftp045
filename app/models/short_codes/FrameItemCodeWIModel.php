<?php


namespace app\models\short_codes;



class FrameItemCodeWIModel extends ShortCodeWithInnerModel
{
    public function getCode()
    {
        return "frame-item";
    }

    public function getReplacement($params = null)
    {
        $arguments = isset($params['args']) ? $params['args'] : [];
        $content = isset($params['content']) ? $params['content'] : "";

        $clazz = "frame-item " . (isset($arguments['class']) ? $arguments['class'] : "");

        $html = "<div class='$clazz'>$content</div>";

        return $html;
    }
}