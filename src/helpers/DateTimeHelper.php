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

    /**
     * 格式化时间戳 年-月-日
     * @param $timestamp
     * @return false|string
     */
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
     * 获取对应天开始时间戳
     * @param $time
     * @return int
     */
    public static function startOfDay($time)
    {
        return strtotime("midnight", $time);
    }

    /**
     * 获取对应天结束时间戳
     * @param $time
     * @return int
     */
    public static function endOfDay($time)
    {
        return strtotime("tomorrow", $time) - 1;
    }

    /**
     * 星期开始时间
     * @param $time
     * @return false|int
     */
    public static function startOfWeek($time)
    {
        return strtotime('midnight', strtotime('this week', $time));
    }

    /**
     * 获取对应月份开始时间戳
     * @param $time
     * @return false|int
     */
    public static function startOfMonth($time)
    {
        return strtotime('midnight', strtotime('first day of this month', $time));
    }
}