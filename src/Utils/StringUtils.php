<?php
namespace Juice\Utils;

class StringUtils
{
    public static function toIntArray($string, $delimiter = ',', $callback = null)
    {
        $array = explode($delimiter, $string);
        array_walk($array, function (&$v) {
            $v = intval($v);
        });
        if ($callback && is_callable($callback)) {
            $array = array_filter($array, $callback);
        }
        return $array;
    }
}
