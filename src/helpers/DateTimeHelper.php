<?php
/**
 * Created by PhpStorm.
 * User: cz
 * Date: 2018/3/22
 * Time: 17:07
 */

namespace juice\helpers;


class DateTimeHelper
{

    public static function short($timestamp)
    {
        return self::format($timestamp, 'Y-m-d');
    }

    /**
     * 格式化时间戳
     * @param $timestamp
     * @param string $format
     * @return false|string
     */
    public static function format($timestamp, $format = 'Y-m-d H:i:s')
    {
        if ($timestamp > 0) {
            return date($format, $timestamp);
        } else {
            return '';
        }
    }

    /**
     *
     * @param $time
     * @return int
     */
    public static function startOfDay($time)
    {
        return strtotime("midnight", $time);
    }

    /**
     *
     * @param $time
     * @return int
     */
    public static function endOfDay($time)
    {
        return strtotime("tomorrow", $time) - 1;
    }
}