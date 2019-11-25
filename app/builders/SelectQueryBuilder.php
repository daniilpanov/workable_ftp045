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
        $group = null;

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

    public function selectString($cols)
    {
        $parsed_cols = explode(", ", $cols);

        foreach ($parsed_cols as $col)
        {
            $this->select($col);
        }

        return $this;
    }

    public function where($col, $value, $op = null, $op2 = "=", $templates = true)
    {
        if (is_array($value))
        {
            if (empty($value))
                return $this;

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

    public function order($by, $how = "ASC")
    {
        $this->order = $by;
        $this->order_type = $how;

        return $this;
    }

    public function limit($end, $begin = null)
    {
        $this->limit = ($begin ? [$end, $begin] : $end);
        return $this;
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

        $this->sql = substr($this->sql, 0, -2);

        if (!empty($this->where))
        {
            $this->sql .= " WHERE ";

            foreach ($this->where as $item)
            {
                $str = " `{$item['col']}` {$item['op2']} {$item['val']} ";
                if ($item['op'])
                    $str = $item['op'] . $str;
                $this->sql .= $str;
            }
        }

        if ($this->order)
        {
            $this->sql .= " ORDER BY " . $this->order . " " . $this->order_type;
        }

        if ($this->limit)
        {
            $this->sql .= " LIMIT "
                . (is_array($this->limit)
                    ? implode(", ", $this->limit)
                    : $this->limit
                );
        }

        return $this;
    }
}