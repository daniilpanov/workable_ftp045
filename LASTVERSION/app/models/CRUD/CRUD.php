<?php


namespace app\models\CRUD;


use app\exceptions\RequiredPropEmptyCLException;
use app\models\Model;

class CRUD extends Model
{
    private $old_data = [];

    public function get($id)
    {
        $this->id = $id;
        // TODO: getting a data row
    }

    public function getByCol($col, $val)
    {
        // TODO: getting a data row by params (col, val)
    }

    public function getAll($params = [])
    {
        // TODO: create query for getting any data rows
        //    and then in 'foreach' cycle clone 'this' object and call 'setData' method
    }

    public function post($data)
    {
        if ($this->id)
        {
            $cloned = clone $this;
            $cloned->id = null;

            return $cloned->post($data);
        }

        $this->setData($this->old_data = $data);
        // TODO: creating a data row
    }

    public function put($data)
    {
        if (!$this->id)
            throw new RequiredPropEmptyCLException();

        $cols = array_diff_assoc($this->old_data, $data);
        $q = count($cols);

        if ($q == 0)
            return null;
        elseif ($q <= 2)
        {
            $c = 0;
            foreach ($cols as $col => $val)
            {
                $c ++;
                if (!$this->patch($col, $val))
                    return [false, $c];
            }
        }
        else
        {
            // TODO: Create a query to DB for changing a row of data
        }
    }

    public function patch($col, $val)
    {
        // TODO: create a query for replacing data in ONE COL
    }

    public function delete($id)
    {
        // TODO: create query for deleting ONE DATA ROW
    }

    public function save()
    {
        // TODO: universal method for saving data.
        //    If id isset, calls method 'put', calls 'post' otherwise
    }
}