<?php
function request()
{
    // TODO: Create helper (class = models\Request)
}

function getClass($obj, $e = true)
{
    $cl = get_class($obj);

    if (strpos($cl, "AdvancedObj"))
        $cl = get_class($obj->getBaseInstance());

    return is_object($obj) ? ($e ? getLastClass($cl) : $cl) : false;
}

function getLastClass($namespace)
{
    $nsc = explode("\\", $namespace);
    return end($nsc);
}


function logg($data = null, string $hint = "", string $start_symbol = "")
{
    if ($data === null)
    {
        echo "<p>$hint</p>";
        return;
    }

    echo "<p><h4>hint: $hint</h4><pre>$start_symbol<br>type: ";

    if (is_callable($data) && !is_object($data))
    {
        echo "callable<br>DATA: ";
        $data();
    }
    elseif (is_string($data))
    {
        echo "str<br>DATA: " . $data;
    }
    else
    {
        echo "another<br>DATA: ";
        var_dump($data);
    }

    echo "</pre></p>";
}

function array_spec_diff($arr1, $arr2)
{
    foreach ($arr2 as $key => $value)
    {
        foreach ($arr1 as $index => $item)
        {
            if ($key == $index)
            {
                if (is_array($item))
                {
                    $found = false;

                    foreach ($item as $variants)
                    {
                        if ($value == $variants)
                        {
                            $found = true;
                            break;
                        }
                    }

                    if ($found)
                        unset($arr1[$key]);
                }
                else
                {
                    if ($item == $value)
                        unset($arr1[$key]);
                }
            }
        }
    }

    return $arr1;
}