<?php

function timeStamp(callable $func, bool $return_real_time = false, $args = [])
{
    $start = microtime(true);
    $func(...$args);
    for ($i = 0; $i < 100; $i ++)
    {
        echo "$i<br>";
    }
    $end = microtime(true);

    return ($return_real_time ? ['start' => $start, 'end' => $end] : $start - $end);
}