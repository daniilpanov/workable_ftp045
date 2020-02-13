<?php


namespace app\models\short_codes;



class FrameCodeWIModel extends ShortCodeWithInnerModel
{
    public function getCode()
    {
        return "frame";
    }

    public function getReplacement($params = null)
    {
        $arguments = isset($params['args']) ? $params['args'] : [];
        $content = isset($params['content']) ? $params['content'] : "";

        $clazz = "frame " . (isset($arguments['class']) ? $arguments['class'] : "");

        $html = "<div class='$clazz'>$content</div>";

        return $html;
    }
}