<?php
/**
 * Created by PhpStorm.
 * User: cz
 * Date: 2018/3/22
 * Time: 17:07
 */

namespace Juice\helpers;


class DateTimeHelper
{
    public static function short($timestamp)
    {
        return self::format($timestamp, 'Y-m-d');
    }

    public static function format($timestamp, $format = 'Y-m-d H:i:s')
    {
        return date($format, $timestamp);
    }
}