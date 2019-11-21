<?php


namespace app\builders;


class SelectQueryBuilder extends QueryBuilder
{
    public $select = [],
        $from,
        $where = [],
        $order = null,
        $order_type = "ASC",
        $limit = null,
        $group = null,
        $templates = [];

    private function addTemplate($name, $value)
    {
        if (isset($this->templates[$name]))
            $name = $this->addTemplate($name . "i", $value);
        $this->templates[$name] = $value;

        return $name;
    }

    public function from($table, $database = null)
    {
        $this->from[] = ($database ? $database . "." . $table : $table);

        return $this;
    }

    public function select($col, $as = null)
    {
        if ($col instanceof self)
        {
            $col = "(" . $col->getSql() . ")";
        }

        $this->select[] = ['col' => $col, 'as' => $as];

        return $this;
    }

    public function where($col, $value, $op = null, $op2 = "=", $templates = true)
    {
        if (is_array($value))
        {
            $this->where($col, $value[0], $op, ">=", $templates);
            $this->where($col, $value[1], "AND", "<", $templates);
        }
        else
        {
            if ($templates)
                $value = ":" . $this->addTemplate($col, $value);
            else
                $value = "'$value'";

            $this->where[] = ['col' => $col, 'val' => $value, 'op' => $op, 'op2' => $op2];
        }

        return $this;
    }

    public function and($col, $value, $op2 = "=", $templates = true)
    {
        return $this->where($col, $value, "AND", $op2, $templates);
    }

    public function init()
    {
        $this->sql = "SELECT ";

        if (!is_array($this->select))
            $this->sql .= $this->select;
        elseif (empty($this->select))
            $this->sql .= "*";
        else
        {
            foreach ($this->select as $item)
            {
                $this->sql .= ($item['as'] ? "{$item['col']} as {$item['as']}" : $item['col']) . ", ";
            }

            $this->sql = substr($this->sql, 0, -2);
        }

        $this->sql .= " FROM ";

        foreach ($this->from as $item)
        {
            $this->sql .= "$item, ";
        }

        $this->sql = substr($this->sql, 0, -2) . " WHERE ";

        foreach ($this->where as $item)
        {
            $str = " `{$item['col']}` {$item['op2']} {$item['val']} ";
            if ($item['op'])
                $str = $item['op'] . $str;
            $this->sql .= $str;
        }

        return $this;
    }

}