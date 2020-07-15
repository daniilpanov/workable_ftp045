<?php


namespace app\models\short_codes;



class SliderCodeModel extends ShortCodeModel
{
    private $label = 0;

    public function getCode()
    {
        return "slider";
    }

    public function getReplacement($params = null)
    {
        $path_prefix = $params['img'];
        $quantity = (isset($params['quant']) ? $params['quant'] : false);
        $type = (isset($params['type']) ? $params['type'] : "jpg");
        $alt = (isset($params['alt']) ? $params['alt'] : "Sorry, this image can not be loaded!");

        $html = "<div class='img-container'>
            <img src='$path_prefix"
            . ($quantity ? ".1" : "") . ".$type' alt='$alt'"
            . ($quantity ? " aria-controls='" . $this->label . "'" : "") . ">";
        if (isset($params['subscr']) && ($subscr = $params['subscr']))
        {
            $html .= "<div class='img-subscr'>$subscr";
            if (isset($params['contact']) && $params['contact'] == 'true')
            {
                if (strpos($subscr, "<") === 0)
                {
                    if (preg_match("/<span.*>(.*)<\/span>/", $subscr, $m))
                        $subscr = $m[1];
                }
                $html .= "<p></p><a class='contact_us' target='_blank' href='?page=contacts&product=\"$subscr\"'>Хочу такое же!</a>";
            }
            $html .= "</div>";
        }
        $html .= "</div>\n";

        if ($quantity)
        {
            //
            $html .= "<div id=\"carousel" . $this->label . "\" class=\"carousel slide center-block\" data-ride=\"carousel\" aria-controls=\""
                . $this->label
                . "\">
        <table class=\"carousel-outer\">
            <!-- Индикаторы -->
            <ol class=\"carousel-indicators\">
                <li data-target=\"#carousel" . $this->label . "\" data-slide-to=\"0\" class=\"active\"></li>";
            //
            $slides_part = "<div class='carousel-item text-center active'>
        <img class='img-fluid no-zoom' src='$path_prefix.1.$type' alt='$alt'>
    </div>";

            for ($i = 1, $j = 2; $j <= $quantity; $i++, $j++)
            {
                $html .= "<li data-target=\"#carousel" . $this->label . "\" data-slide-to=\"$i\"></li>";
                $slides_part .= "<div class='carousel-item text-center'>
        <img class='img-fluid no-zoom' src='$path_prefix.$j.$type' alt='$alt'>
    </div>";
            }

            $html .= "</ol>"
                . "<td class=\"carousel-inner zoomed\">"
                . $slides_part
                . "</td>"
                . "<!-- Элементы управления -->
            <a class=\"carousel-control-prev\" href=\"#carousel" . $this->label . "\" role=\"button\" data-slide=\"prev\">
                <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                <span class=\"sr-only\">Предыдущий</span>
            </a>
            <a class=\"carousel-control-next\" href=\"#carousel" . $this->label . "\" role=\"button\" data-slide=\"next\">
                <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                <span class=\"sr-only\">Следующий</span>
            </a>
        </table>
    </div>";

            //
            $this->label++;
        }
        //
        return $html;
    }
}