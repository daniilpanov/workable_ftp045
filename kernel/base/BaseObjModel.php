<?php


namespace engine\base;


abstract class BaseObjModel extends BaseObj
{
    public function setData($data)
    {
        if (!$data)
            return;

        if (is_assoc($data))
        {
            foreach ($data as $col => $value)
            {
                $this->$col = $value;
            }
        }
        else
        {
            $cols = array_keys(get_object_vars($this));

            for ($i = 0; $i < count($data); $i++)
            {
                $col = $cols[$i];
                $this->$col = $data[$i];
            }
        }
    }
}