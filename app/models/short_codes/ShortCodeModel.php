<?php

// Hello! This is an universal abstract class for making short-codes!
// I'll describe it to you right now. Let's go!


namespace app\models\short_codes;


use engine\base\Model;

abstract class ShortCodeModel extends Model implements ShortCodeModelBase
{
    // Метод замены short-code на его значение
    public function replaceCode($content)
    {
        // Ищем short-codes
        if (preg_match_all(
            "/\[" . $this->getCode() . "( ([^\]]+))?\]/s",
            $content, $codes,
            PREG_SET_ORDER
        ))
        {
            // перебираем то, что нашли
            foreach ($codes as $code)
            {
                // если есть аргументы - получаем их
                if (isset($code[2]) && $code[2])
                {
                    preg_match_all("/([^=^ ]+)=(\"([^'^\"]+?)\"|'(.+?)')/",
                        $code[2], $arguments, PREG_SET_ORDER);

                    // и приводим к ассоциативному массиву
                    foreach ($arguments as $key => $arg)
                    {
                        unset($arguments[$key]);
                        $value = (isset($arg[3]) && $arg[3]) ? $arg[3] : $arg[4];

                        $arguments[$arg[1]] = $value;
                    }
                }

                // Заменяем short-codes на их значения в самом контенте
                $content = str_replace($code[0], $this->getReplacement($arguments), $content);
            }
        }

        // и возвращаем готовый контент
        return $content;
    }
}

// You can create extensions of this class to create a new short-code
// That's all!