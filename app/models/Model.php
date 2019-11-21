<?php


namespace app\models;


use app\BaseObj;
use app\factories\Factory;

abstract class Model extends BaseObj
{
    const RETURN = -1;

    private $group = null;

    /**
     * @param $group string|int|null
     * @return string|int|null|void
     */
    public function group($group = self::RETURN)
    {
        if ($group === self::RETURN)
            return $this->group;

        $this->group = $group;
    }

    public static function setData($obj, $data_arr)
    {
        if (is_assoc($data_arr))
        {
            foreach ($data_arr as $col => $value)
            {
                $obj->$col = $value;
            }
        }
        else
        {
            $cols = array_keys(get_object_vars($obj));
            var_dump($data_arr);
            for ($i = 0; $i < count($data_arr); $i++)
            {
                $col = $cols[$i];
                $obj->$col = $data_arr[$i];
            }
        }
    }
}